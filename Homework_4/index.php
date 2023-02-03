<?php
declare(strict_types=1);

use App\Bank\Currency;
use App\Bank\Money;
use http\Exception\InvalidArgumentException;

require_once "bootstrap.php";

try {

    $currencyUan = new Currency("UAH");

    $moneyUan250 = new Money($currencyUan, 250);
    $moneyUan900_1 = new Money($currencyUan, 900.1);

    $moneyUan250->add($moneyUan900_1);
    echo "{$moneyUan250->getAmount()} {$moneyUan250->getCurrency()->getIsoCode()}";

} catch (InvalidArgumentException $e) {
    echo $e->getMessage();
}


