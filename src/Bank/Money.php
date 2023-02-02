<?php

namespace App\Bank;

use http\Exception\InvalidArgumentException;

class Money
{
    private Currency $currency;
    private float $amount;

    public function __construct(Currency $currency, float $amount)
    {
        $this->setCurrency($currency);
        $this->setAmount($amount);
    }

    private function setCurrency(Currency $currency): void
    {
        $this->currency = $currency;
    }

    public function getCurrency(): Currency
    {
        return $this->currency;
    }

    private function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function add(Money $money_new): float
    {
        if (!$this->currency->equals($money_new->currency))
            throw new InvalidArgumentException('Currencies do not match.');

        $this->setAmount($this->getAmount() + $money_new->getAmount());
        return $this->getAmount();

    }
}