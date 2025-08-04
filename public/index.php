<?php
require __DIR__.'/../vendor/autoload.php';

use App\Controller\CurrencyController;
use App\Service\CurrencyConverter;

try {
    $converter = new CurrencyConverter();
    echo (new CurrencyController($converter))->index();
} catch (Throwable $e) {
    echo "Ошибка: " . $e->getMessage();
    error_log($e->getMessage());
}