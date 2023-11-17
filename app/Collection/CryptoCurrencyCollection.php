<?php

declare(strict_types=1);

namespace App\Collection;

use App\Models\CryptoCurrency;

class CryptoCurrencyCollection
{
    private array $cryptoCurrencies;

    public function __construct()
    {
        $this->cryptoCurrencies = [];
    }

    public function addCryptoCurrency(CryptoCurrency $cryptoCurrency): void
    {
        $this->cryptoCurrencies[] = $cryptoCurrency;
    }

    public function get(): array
    {
        return $this->cryptoCurrencies;
    }
}