<?php


declare(strict_types=1);

namespace App\Models;

class CryptoCurrency
{

    private string $symbol;
    private string $lastPrice;
    private string $priceChangePercent;
    private string $lowPrice;
    private string $highPrice;


    public function __construct(
        string $symbol,
        string $lastPrice,
        string $priceChangePercent,
        string $lowPrice,
        string $highPrice
    )
    {
        $this->symbol = $symbol;
        $this->lastPrice = $lastPrice;
        $this->priceChangePercent = $priceChangePercent;
        $this->lowPrice = $lowPrice;
        $this->highPrice = $highPrice;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getPriceChangePercent(): string
    {
        return $this->priceChangePercent;
    }

    public function getLastPrice(): string
    {
        return $this->lastPrice;
    }

    public function getHighPrice(): string
    {
        return $this->highPrice;
    }

    public function getLowPrice(): string
    {
        return $this->lowPrice;
    }
}