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
        return $this->($this->getKeyName());
    }

    /**
     * Index method for elasticsearch
     * @return void
     */
    public function elasticIndex() {
        $es = \App::make('elasticsearch');

        $params = [
            "index" =>  DB::connection()->getDatabaseName(),
            "type"  =>  $this->table,
            "id"    =>  $this->getKeyValue(),
            "body"  =>  []
        ];

        foreach ($this->index as $key => $attr) {
            if (!isset($this->attributes[$attr])) continue;

            $params["body"][$attr] = $this->attributes[$attr];
        }

        $params["body"]["id"] = $this->getKeyValue();

        $es->index($params);
    }

    /**
     * Delete method for elasticsearch
     * @return void
     */
    public function elasticDelete() {
        $es = \App::make('elasticsearch');

        $params = [
            "index" =>  DB::connection()->getDatabaseName(),
            "type"  =>  $this->table,
            "id"    =>  $this->getKeyValue()
        ];

        $es->delete($param);
    }

    /**
     * Search by elasticsearch
     * @return Model
     */
    public function elasticSearch(array $options) {
        $es = \App::make('elasticsearch');

        $params = [
            "index" =>  DB::connection()->getDatabaseName(),
            "type"  =>  $this->table,
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

        $search = $es->search($param);

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
