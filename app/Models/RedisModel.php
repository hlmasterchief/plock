<?php namespace App\Models;

class RedisModel {

    protected $redis;
    protected $es;

    protected $root = "root";
    protected $type = "type";
    protected $id   = "unique_id";

    protected $cast  = [];
    protected $index = [];

    public function __construct() {
        $this->redis = \App::make('redis');
        $this->es    = \App::make('elasticsearch');
    }

    public function getUniqueId() {
        return $this->redis->incr("$this->root:$this->type:$this->id");
    }

    public function save(array $array) {
        $id = $this->getUniqueId();
        $array["id"] = $id;
        $this->redis->hmset("$this->root:$this->type:$id", $array);

        $this->index($id);
    }

    public function delete($id) {
        $param = [
            "index" =>  "$this->root",
            "type"  =>  "$this->type",
            "id"    =>  "$this->id"
        ];

        $this->redis->del("$this->root:$this->type:$id");
        $this->es->delete($param);
    }

    public function index($id) {
        $array = $this->redis->hgetall("$this->root:$this->type:$id");

        $param = [
            "index" =>  "$this->root",
            "type"  =>  "$this->type",
            "id"    =>  "$id",
            "body"  =>  []
        ];

        foreach ($this->index as $key => $value) {
            if (isset($array[$value])) {
                $param["body"][$value] = $array[$value];
            }
        }

        $param["body"]["id"] = $id;

        $response = $this->es->index($param);

        return $response;
    }

    public function get($id) {
        $array = $this->redis->hgetall("$this->root:$this->type:$id");
        $array = $this->cast($array);

        return $array;
    }

    public function cast($array) {
        foreach ($array as $key => $value) {
            if (is_null($value)) continue;
            if (!isset($this->cast[$key])) continue;

            switch ($this->cast[$key]) {
                case 'int':
                case 'integer':
                    $array[$key] = (int) $value;
                case 'real':
                case 'float':
                case 'double':
                    $array[$key] = (float) $value;
                case 'string':
                    $array[$key] = (string) $value;
                case 'bool':
                case 'boolean':
                    $array[$key] = (bool) $value;
                case 'object':
                    $array[$key] = json_decode($value);
                case 'array':
                case 'json':
                    $array[$key] = json_decode($value, true);
                case 'collection':
                    $array[$key] = collect(json_decode($value, true));
                default:
                    $array[$key] = $value;
            }
        }

        return $array;
    }

    public function find($array) {
        $param = [
            "index" =>  "$this->root",
            "type"  =>  "$this->type",
            "body"  =>  [
                "query" => [
                    "bool" => [
                        "must" => []
                    ] // bool
                ] // query
            ] // body
        ];

        $results = [];

        foreach ($array as $key => $value) {
            $param["body"]["query"]["bool"]["must"][] = ["match" => [$key => $value]];
        }

        $search = $this->es->search($param);

        foreach ($search["hits"]["hits"] as $key => $value) {
            $results[] = $this->get($value["_source"]["id"]);
        }

        return collect($results);
    }

    public function all() {
        $param = [
            "index" =>  "$this->root",
            "type"  =>  "$this->type"
        ];

        $results = [];

        $search = $this->es->search($param);

        foreach ($search["hits"]["hits"] as $key => $value) {
            echo $value["_source"]["id"];
            $results[] = $this->get($value["_source"]["id"]);
        }

        return collect($results);
    }

}
