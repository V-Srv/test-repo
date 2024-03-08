<?php

namespace Denis\TestRepo;

interface ImageCalculationInterface {
    public function calculate(array $imageDimensionsA, array $imageDimensionsB): array;
}
