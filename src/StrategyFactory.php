<?php

namespace Denis\TestRepo;

class StrategyFactory {
    public function getStrategy(string $strategy): ImageCalculationInterface
    {
        return match ($strategy) {
            'contain' => new ContainStrategy(),
            'cover' => new CoverStrategy(),
        };
    }
}
