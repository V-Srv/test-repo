<?php

namespace Denis\TestRepo;

class CoverStrategy implements ImageCalculationInterface {

    public function calculate(array $imageDimensionsA, array $imageDimensionsB): array
    {
        $scaleWidth = $imageDimensionsA[0] / $imageDimensionsB[0];
        $scaleHeight = $imageDimensionsA[1] / $imageDimensionsB[1];

        $scale = max($scaleWidth, $scaleHeight);

        $newWidth = intval($imageDimensionsB[0] * $scale);
        $newHeight = intval($imageDimensionsB[1] * $scale);
        return [$newWidth, $newHeight];
    }
}
