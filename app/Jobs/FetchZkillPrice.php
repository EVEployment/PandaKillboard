<?php

namespace App\Jobs;

use App\Models\Price;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class FetchZkillPrice implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(private readonly int $type_id)
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $prices = Http::get("https://zkillboard.com/api/prices/$this->type_id/")->collect();
        $existsDate = Price::where('type_id', $this->type_id)->pluck('date');
        $prices
            ->reject(fn ($v, $k) => $existsDate->contains($k))
            ->each(function ($price, $date) {
                if ($date === 'currentPrice' || $date === 'typeID') return;
                Price::firstOrCreate([
                    'type_id' => $this->type_id,
                    'date' => $date,
                ], [
                    'adjusted_price' => $price,
                    'average_price' => $price,
                ]);
            });
    }
}
