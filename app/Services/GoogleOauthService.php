<?php

namespace App\Services;


use App\Models\User;
use Google\Client;
use Google\Service\Oauth2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GoogleOauthService
{
    private Client $client;

    public function __construct()
    {
        //https://console.cloud.google.com/
        $client = new Client();
        $client->setClientId(config('services.google')['client_id']);
        $client->setClientSecret(config('services.google')['client_secret']);
        $client->setRedirectUri(config('services.google')['redirect']);
        $this->setClient($client);
    }

    public function getClientAuth()
    {
        $client = $this->getClient();
        $client->addScope('email');
        $client->addScope('profile');

        return $client;
    }

    public function getUserInfo(Request $request)
    {
        if (isset($request->code)) {
            $client = $this->getClient();
            $token = $client->fetchAccessTokenWithAuthCode($request->code);
            if (isset($token['access_token'])) {
                $client->setAccessToken($token['access_token']);
                $oauth = new Oauth2($client);
                $info = $oauth->userinfo->get();

                return (new AuthService())->oauth($info->email, $info->name, $info->id);
            }
        }

        return false;
    }

    /**
     * @param Client $client
     */
    public function setClient(Client $client): self
    {
        $this->client = $client;
        return $this;
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

}
