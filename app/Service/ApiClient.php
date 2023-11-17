<?php
declare(strict_types=1);

namespace App\Service;

use App\Collection\CryptoCurrencyCollection;
use App\Models\CryptoCurrency;
use GuzzleHttp\Client;

class ApiClient
{
    const API_URL = "https://api4.binance.com/api/v3/ticker/24hr?symbol=";
    private Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'verify' => false
        ]);
    }

    public function getTickerData(array $symbols): CryptoCurrencyCollection
    {
        $cryptoCurrencyCollection = new CryptoCurrencyCollection();

        foreach ($symbols as $symbol) {
            $apiUrl = self::API_URL . $symbol;
            $response = $this->client->get($apiUrl);

            $tickerData = json_decode((string)$response->getBody(), true);

            $cryptoCurrency = new CryptoCurrency(
                $tickerData['symbol'],
                $tickerData['lastPrice'],
                $tickerData['priceChangePercent'],
                $tickerData['lowPrice'],
                $tickerData['highPrice'],
            );
            $cryptoCurrencyCollection->addCryptoCurrency($cryptoCurrency);
        }

        return $cryptoCurrencyCollection;
    }
}