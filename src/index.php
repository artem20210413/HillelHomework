<?php

namespace App;

use App\Bank\Currency;
use App\Bank\Money;
use http\Exception;
use http\Exception\InvalidArgumentException;

try {

    $currency_Usd = new Currency("USD");
    $currencyUan = new Currency("UAH");

    $moneyUan250 = new Money($currencyUan, 250);
    $moneyUan900_1 = new Money($currencyUan, 900.1);

    $moneyUan250->add($moneyUan900_1);
    echo $moneyUan250->getAmount();
} catch (InvalidArgumentException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}


