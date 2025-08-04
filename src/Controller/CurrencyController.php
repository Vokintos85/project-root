<?php
namespace App\Controller;

use App\Service\CurrencyConverter;
use Exception;

class CurrencyController
{
    private CurrencyConverter $converter;

    public function __construct(CurrencyConverter $converter)
    {
        $this->converter = $converter;
    }

    public function index()
    {
        // Получаем данные
        $data = [
            'currencies' => $this->converter->getAvailableCurrencies(),
            'result' => null,
            'error' => null,
            'post' => $_POST
        ];

        // Обработка формы
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['amount'], $_POST['from'], $_POST['to'])) {
            try {
                $data['result'] = [
                    'amount' => (float)$_POST['amount'],
                    'from' => $_POST['from'],
                    'to' => $_POST['to'],
                    'converted' => $this->converter->convert($_POST['from'], $_POST['to'], (float)$_POST['amount'])
                ];
            } catch (Exception $e) {
                $data['error'] = $e->getMessage();
            }
        }

        // Извлекаем переменные для представления
        extract($data);

        // Подключаем представление
        require __DIR__.'/../../views/currency/index.php';
    }
}