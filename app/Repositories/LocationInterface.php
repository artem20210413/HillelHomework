<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface LocationInterface
{
    public function getCountry(Request $request);

    public function getCity(Request $request);

    public function getPostalCode(Request $request);
}
