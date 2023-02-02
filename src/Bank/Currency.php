<?php

namespace App\Bank;

use http\Exception\InvalidArgumentException;

class Currency
{
    private string $isoCode;

    public function __construct(string $isoCode)
    {
        if ($this->valid($isoCode))
            $this->setIsoCode($isoCode);
    }

    private function setIsoCode(string $isoCode): void
    {
        $this->isoCode = $isoCode;
    }

    public function getIsoCode(): string
    {
        return $this->isoCode;
    }

    public function equals(Currency $currency_new): bool
    {
        return ($this->isoCode === $currency_new->isoCode) ?? true;
    }

    private function valid(string $isoCode): bool
    {
        if (!ctype_upper($isoCode) && strlen($isoCode) !== 3)
            throw new InvalidArgumentException('Currency name is not in ISO 4217 format.');

        return true;
    }
}
