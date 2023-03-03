<?php


namespace App\Services\Middleware;


use App\Models\Guests;

class SaveInfoUserService
{

    public function save(string $userIp, string $country, string $redirect): void
    {
        $guest = new Guests();
        $guest->user_ip = $userIp;
        $guest->country = $country;
        $guest->redirect = $redirect;
        $guest->save();
    }


}
