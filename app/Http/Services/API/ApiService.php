<?php

namespace AM\App\Http\Services\API;

use GuzzleHttp\Exception\GuzzleException;

class ApiService extends AbstractClientService
{
    public function __construct($baseUrl)
    {
        $this->setBaseUri($baseUrl);
        $this->setAuth(false);

        parent::__construct();
    }

    /**
     * @throws GuzzleException
     */
    public function fetchData(string $endpoint)
    {
        $response = $this->client->get($endpoint);
        return json_decode($response->getBody(), true);
    }

}