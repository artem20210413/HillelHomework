<?php

namespace App\Http\Controllers\Redirect;

use App\Services\Redirect\RedirectToShopServices;
use Illuminate\Http\Request;

class RedirectToShopController
{

    public function show(Request $request, RedirectToShopServices $redirectToShopServices)
    {
        $redirectToShopServices->redirect($request);
    }

}
