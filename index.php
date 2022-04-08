<?php

use src\Delivery;
use src\DeliveryCalculator;

spl_autoload_register(
    function ($item) {
        require_once $item . '.php';
    }
);

$inputData = [
    'departures' => [
        [
            'sourceKladr' => '5004400019600',
            'targetKladr' => '66004000004000100',
            'weight' => 100,
            'type' => 'fast'
        ],
        [
            'sourceKladr' => '66016000016000200',
            'targetKladr' => '66016000004004800',
            'weight' => 50,
            'type' => 'slow'
        ],
        [
            'sourceKladr' => '66016000016000200',
            'targetKladr' => '66016000004004800',
            'weight' => 70,
            'type' => 'fast'
        ]
    ],
    'time' => time()
];

$date = new DateTime();
$date->setTimestamp($inputData['time']);
if ((int)$date->format('H') >= 18) {
    echo json_encode(
        [
            'error' => 'Заказы после 18:00 не принимаются!'
        ]
    );
    return;
}

$deliveryCalculator = new DeliveryCalculator();
foreach ($inputData['departures'] as $departure) {
    $response[] = $deliveryCalculator->calculateDelivery(
        Delivery::fromParams(
            $departure['type'],
            $departure['sourceKladr'],
            $departure['targetKladr'],
            $departure['weight']
        )
    );
}

echo json_encode($response);
