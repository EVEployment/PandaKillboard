<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Repositories\EntityRepository;
use App\EseyeFactory;

class GetAlliance implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $alliance_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(int $alliance_id) {
        $this->alliance_id = $alliance_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(EntityRepository $entity, EseyeFactory $eseye) {
        if (!$entity->isEntityNeedUpdate($this->alliance_id)) return;
        $alliance_data = $eseye->setVersion('v4')->invoke('get', '/alliances/{alliance_id}/', ['alliance_id' => $this->alliance_id]);
        $entity->updateAlliance($this->alliance_id, $alliance_data);
        return;
    }
}
