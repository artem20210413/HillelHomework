<?php

namespace App\Facades;

class LocationFacade extends \Illuminate\Support\Facades\Facade
{

    protected static function getFacadeAccessor()
    {
        return 'location';
    }

}
