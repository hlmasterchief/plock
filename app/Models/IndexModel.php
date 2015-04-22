<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndexModel extends Model {

    /**
     * Key collection for elasticsearch index
     * @var array[string]
     */
    protected $index = [];

    /**
     * Help for getting primary key value
     * @return mixed
     */
    public function getKeyValue() {
        $keyName = $this->getKeyName();
        return $this->$keyName;
    }

    /**
     * Help for getting elastic index
     * @return mixed
     */
    public function getElasticIndex() {
        return \DB::connection()->getDatabaseName();
    }

    /**
     * Help for getting elastic type
     * @return mixed
     */
    public function getElasticType() {
        return $this->table;
    }

    /**
     * Help for getting elastic id
     * @return mixed
     */
    public function getElasticId() {
        return $this->getKeyValue();
    }

    /**
     * Index method for elasticsearch
     * @return void
     */
    public function elasticIndex() {
        $es = \App::make('elasticsearch');

        $params = [
            "index" =>  $this->getElasticIndex(),
            "type"  =>  $this->getElasticType(),
            "id"    =>  $this->getElasticId(),
            "body"  =>  []
        ];

        foreach ($this->index as $key => $attr) {
            if (!isset($this->attributes[$attr])) continue;

            $params["body"][$attr] = $this->attributes[$attr];
        }

        $exists = $es->exists(array_only($params, ['index', 'type', 'id']));

        if ($exists) {
            $doc = array_except($params["body"], ['doc']);
            $params["body"]["doc"] = $doc;
            $params["body"] = array_only($params["body"], ['doc']);

            $es->update($params);
        } else {
            $es->index($params);
        }

        return true;
    }

    /**
     * Delete method for elasticsearch
     * @return void
     */
    public function elasticDelete() {
        $es = \App::make('elasticsearch');

        $params = [
            "index" =>  $this->getElasticIndex(),
            "type"  =>  $this->getElasticType(),
            "id"    =>  $this->getElasticId()
        ];

        try {
            $es->delete($param);
        } catch (Exception $e) {
            return false;
        }

        return true;
    }

    /**
     * Search by elasticsearch
     * @return Model
     */
    public function elasticSearch(array $options) {
        $es = \App::make('elasticsearch');

        $params = [
            "index" =>  $this->getElasticIndex(),
            "type"  =>  $this->getElasticType(),
            "body"  =>  [
                "query" => [
                    "bool" => [
                        "must" => []
                    ] // bool
                ] // query
            ] // body
        ];

        $results = [];

        foreach ($options as $key => $value) {
            $params["body"]["query"]["bool"]["must"][] = ["match" => [$key => $value]];
        }

        try {
            $search = $es->search($params);
        } catch (Exception $e) {
            return mull;
        }

        foreach ($search["hits"]["hits"] as $key => $value) {
            $results[] = $this->find($value["_source"]["id"]);
        }

        return collect($results);
    }

    /**
     * @override
     * Finish processing on a successful save operation.
     *
     * @param  array  $options
     * @return void
     */
    protected function finishSave(array $options)
    {
        $this->fireModelEvent('saved', false);

        $this->syncOriginal();

        if (array_get($options, 'touch', true)) $this->touchOwners();

        $this->elasticIndex();
    }

    /**
     * @override
     * Perform the actual delete query on this model instance.
     *
     * @return void
     */
    protected function performDeleteOnModel()
    {
        $this->elasticDelete();

        $this->setKeysForSaveQuery($this->newQuery())->delete();
    }

}
