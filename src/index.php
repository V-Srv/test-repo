<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Denis\TestRepo\StrategyFactory;

const MESSAGE = 'Please provide 5 params: type (cover/contain) w1 h1 w2 h2';
const VALIDATION = 'Please provide integers for the dimensions';

if (!isset($argv[1]) || $argv[1] === 'help') {
    echo MESSAGE;
    exit(0);
}

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
    if (count($params) !== 6) {
        throw new Exception(MESSAGE);
    }

    if (!is_numeric($params[2])
        || !is_numeric($params[3])
        || !is_numeric($params[4])
        || !is_numeric($params[5])
    ) {
        throw new Exception(VALIDATION);
    }

    return [
        'type' => $params[1],
        'width1' => (int) $params[2],
        'height1' => (int) $params[3],
        'width2' => (int) $params[4],
        'height2' => (int) $params[5],
    ];
}
