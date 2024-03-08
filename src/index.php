<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Denis\TestRepo\StrategyFactory;

try {
    $params = parseParams($argv);
} catch (Exception $exception) {
    echo $exception->getMessage();
    exit(1);
}

$strategy = new StrategyFactory();

$strategy = $strategy->getStrategy($params['type']);

$result = $strategy->calculate(
    [
        $params['width1'],
        $params['height1'],
    ], [
        $params['width2'],
        $params['height2'],
    ]
);

echo "$result[0] * $result[1]";

exit(0);

function parseParams(array $params): array {
    if (count($params) !== 6 || $params[1] === 'help') {
        throw new Exception('Please provide 5 params: type (cover/contain) w1 h1 w2 h2');
    }
    return [
        'type' => $params[1],
        'width1' => $params[2],
        'height1' => $params[3],
        'width2' => $params[4],
        'height2' => $params[5],
    ];
}
