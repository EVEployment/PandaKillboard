<?php

namespace App\Jobs\Middleware;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redis;

class EsiErrorLimit
{
    /**
     * Process the queued job.
     *
     * @param  mixed  $job
     * @param  callable  $next
     * @return mixed
     */
    public function handle($job, $next)
    {
        if (App::environment('local')) return $next($job);
        $currentLimitRemaining = Redis::get('esi:error-limit') ?? 100;
        $currentLimitReset = Redis::ttl('esi:error-limit');
        if ($currentLimitRemaining > 20) {
            return $next($job);
        } else {
            $job->release($currentLimitReset + 5);
        }
    }
}
