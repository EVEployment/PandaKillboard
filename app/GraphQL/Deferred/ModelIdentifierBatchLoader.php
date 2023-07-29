<?php

namespace App\GraphQL\Deferred;

use App\Models\InvType;
use GraphQL\Deferred;
use Illuminate\Support\Collection;

class ModelIdentifierBatchLoader {
    /**
     * Record the name of the primary key.
     *
     * @var array
     */
    protected readonly string $primaryKey;

    /**
     * Record the batch of models to load.
     *
     * @var array
     */
    protected array $ids = [];

    /**
     * Record the result of invTypes.
     *
     * @var Collection
     */
    protected ?Collection $models;

    /**
     * Marks when the actual batch loading happened.
     *
     * @var bool
     */
    protected $hasResolved = false;

    public function __construct(protected string $modelName) {
        $this->primaryKey = (new $modelName)->getKeyName();
    }

    public function load($id): Deferred {
        $this->ids[] = $id;

        return new Deferred(function () use ($id) {
            if (!$this->hasResolved) {
                $this->models = $this->modelName::whereIn($this->primaryKey, $this->ids)
                    ->get()->keyBy($this->primaryKey);
                $this->hasResolved = true;
            }

            return $this->models->get($id);
        });
    }
}
