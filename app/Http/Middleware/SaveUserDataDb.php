<?php

namespace App\Http\Middleware;

use App\Facades\LocationFacade;
use App\Services\Middleware\InfoByRequestService;
use Closure;
use Illuminate\Http\Request;

class SaveUserDataDb
{
    public function __construct(public InfoByRequestService $infoByRequestService)
    {
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle(Request $request, Closure $next)
    {
        return $this->infoByRequestService->info($request);
    }
}
