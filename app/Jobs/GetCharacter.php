<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Repositories\EntityRepository;
use App\EseyeFactory;

class GetCharacter implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $character_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(int $character_id) {
        $this->character_id = $character_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(EntityRepository $entity, EseyeFactory $eseye) {
        if (!$entity->isEntityNeedUpdate($this->character_id)) return;
        $character_data = $eseye->setVersion('v4')->invoke('get', '/characters/{character_id}/', ['character_idcharacter_id' => $this->character_id]);
        $entity->updateCharacter($this->character_id, $character_data);
        return;
    }
}
