<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Response;
use App\Service\ApiClient;

class CryptoController
{
    private ApiClient $api;

    public function __construct()
    {
        $this->api = new ApiClient();
    }

    public function index(): Response
    {
        $searchArray = ['BTCEUR', 'XRPEUR', 'SOLEUR'];

        return new Response(
            'Crypto/index',
            [
                'cryptoCollection' => $this->api->getTickerData($searchArray)
            ]
        );
    }

    public function search(): Response
    {
        $input = $_GET['Symbol'] ?? '';
        $searchArray = explode(' ', strtoupper($input));
        return new Response(
            'Crypto/search',
            [
                'cryptoCollection' => $this->api->getTickerData($searchArray)
            ]
        );
    }

}