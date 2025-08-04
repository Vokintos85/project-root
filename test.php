<?php

require __DIR__ . '/vendor/autoload.php';

use Brick\Money\Money;

// Пример использования
$money = Money::of(100, 'USD');
echo $money; // Выведет "USD 100.00"
