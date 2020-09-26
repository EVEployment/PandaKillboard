<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Repositories\EntityRepository;
use App\EseyeFactory;

class GetCorporation implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $corporation_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(int $corporation_id) {
        $this->corporation_id = $corporation_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(EntityRepository $entity, EseyeFactory $eseye) {
        if (!$entity->isEntityNeedUpdate($this->alliance_id)) return;
        $corporation_data = $eseye->setVersion('v4')->invoke('get', '/corporations/{corporation_id}/', ['corporation_id' => $this->corporation_id]);
        $entity->updateCorporation($this->corporation_id, $corporation_data);
        return;
    }
}
