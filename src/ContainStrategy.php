<?php

namespace Denis\TestRepo;

class ContainStrategy implements ImageCalculationInterface {

    public function calculate(array $imageDimensionsA, array $imageDimensionsB): array
    {
        $scaleWidth = $imageDimensionsA[0] / $imageDimensionsB[0];
        $scaleHeight = $imageDimensionsA[1] / $imageDimensionsB[1];

        $scale = min($scaleWidth, $scaleHeight);

        $new_width = intval($imageDimensionsB[0] * $scale);
        $new_height = intval($imageDimensionsB[1] * $scale);
        return [$new_width, $new_height];
    }
}
