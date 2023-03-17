<?php

namespace App\Jobs;

use App\Services\Middleware\InfoByRequestService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class VisitJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public $request)
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(InfoByRequestService $infoByRequestService)
    {
//        $infoByRequestService = new InfoByRequestService();
        $infoByRequestService->info($this->request);
    }
}
