<?php

namespace App\GraphQL\Deferred;

use App\Models\Price;
use Carbon\Carbon;
use GraphQL\Deferred;
use Illuminate\Support\Collection;

class PriceBatchLoader {
    /**
     * Record the batch of models to load.
     *
     * @var array
     */
    protected array $typeIds = [];
    protected array $dates = [];

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

    public function load(int $type_id, Carbon $date): Deferred {
        $this->typeIds[] = $type_id;
        $this->dates[] = $date;

        return new Deferred(function () use ($date, $type_id) {
            if (!$this->hasResolved) {
                $this->models = Price::whereIn('type_id', $this->typeIds)
                    ->whereIn('date', $this->dates)
                    ->get();
                $this->hasResolved = true;
            }

            return $this->models->firstWhere(function ($item) use ($type_id, $date) {
                return $item->type_id === $type_id && $item->date->isSameDay($date);
            });
        });
    }
}
