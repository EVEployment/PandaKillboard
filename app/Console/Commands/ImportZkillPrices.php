<?php

namespace App\Console\Commands;

use App\Models\InvType;
use App\Models\Price;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ImportZkillPrices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:zkillboard:prices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Importing prices from zKillboard');
        $types = InvType::whereNotNull('marketGroupID')->where('published', true)->pluck('typeID');

        foreach ($types as $type) {
            FetchZkillPrice::dispatch($type);
        }

        return Command::SUCCESS;
    }
}
