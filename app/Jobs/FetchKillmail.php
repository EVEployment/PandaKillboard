<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Repositories\KillmailRepository;
use App\EseyeFactory;

class FetchKillmail implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $kill_id;
    public $kill_hash;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id, $hash) {
        $this->kill_id = $id;
        $this->kill_hash = $hash;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(KillmailRepository $killmail, EseyeFactory $eseye) {

        // Dedupe
        if ($killmail->isKillmailExists($this->kill_id)) return;

        $killmail_data = $eseye->setVersion('v1')->invoke('get', '/killmails/{killmail_id}/{killmail_hash}/', [
            'killmail_id' => $this->kill_id,
            'killmail_hash' => $this->kill_hash,
        ]);

        $killmail->writeKillmail($this->kill_id, $this->kill_hash, $killmail_data);
        return;
    }
}
