<?php

namespace App\Console\Commands;

use App\Jobs\FetchKillmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ImportZkilldump extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:zkillboard:dump {date}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import dump from zKillboard';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $date = $this->argument('date');

        if (!is_null($date)) {
            $this->info("Fetching kills in $date");

            $list = Http::get("https://zkillboard.com/api/history/$date.json");
            $data = $list->collect();
            $count = $data->count();
            $this->info("Fetched $count killmails.");
            foreach ($data as $id => $hash) {
                $this->info("Loading $id.");
                FetchKillmail::dispatch($id, $hash);
            }
        }

        return 0;
    }
}
