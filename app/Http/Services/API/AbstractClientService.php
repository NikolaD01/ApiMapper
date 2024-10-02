<?php

namespace AM\App\Http\Services\API;

use GuzzleHttp\Client;

abstract class AbstractClientService
{
    protected string $user;
    protected string $password;
    protected bool $auth;
    protected string $apiKey;
    protected string $baseUri;
    protected Client $client;

    public function __construct()
    {
        $this->setClient();
    }

    public function setUser(string $user) : bool
    {
       return $this->user = $user;
    }

    public function setPassword(string $password) : bool
    {
        return $this->password = $password;
    }

    public function setApiKey(string $apiKey) : bool
    {
        return $this->apiKey = $apiKey;
    }

    public function setAuth(string $auth) : bool
    {
        return $this->auth = $auth;
    }
    public function setBaseUri(string $baseUri) : bool
    {
        return $this->baseUri = $baseUri;
    }

    protected function setClient() : void {
        if(!$this->auth) {
            $this->setClientWithoutAuth();
            return;
        }

        if($this->apiKey) {
            $this->setClientWithKey();
        } else {
            $this->setClientWithAuth();
        }

    }
    private function setClientWithoutAuth() : void {
        $this->client = new Client([
            'base_uri' => $this->baseUri,
            'timeout'  => 10.0,
        ]);
    }
    private function setClientWithKey() : void {
        $this->client = new Client([
            'base_uri' => $this->baseUri,
            'timeout'  => 10.0,
            'headers'  => [
                'Client-Key' => $this->apiKey,
            ],
        ]);
    }

    private function setClientWithAuth() : void {
        $this->client = new Client([
            'base_uri' => $this->baseUri,
            'timeout'  => 10.0,
            'auth'     => [$this->user, $this->password],
        ]);
    }
}