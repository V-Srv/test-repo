<?php

namespace Denis\TestRepo;

class CoverStrategy implements ImageCalculationInterface {

    public function calculate(array $imageDimensionsA, array $imageDimensionsB): array
    {
        $scaleWidth = $imageDimensionsA[0] / $imageDimensionsB[0];
        $scaleHeight = $imageDimensionsA[1] / $imageDimensionsB[1];

        // image B might fit already
        if ($scaleWidth >= 1 && $scaleHeight >= 1) {
            return array($imageDimensionsB[0], $imageDimensionsB[1]);
        }

        $scale = max($scaleWidth, $scaleHeight);

        $scale = min(1, $scale);

        $new_width = intval($imageDimensionsB[0] * $scale);
        $new_height = intval($imageDimensionsB[1] * $scale);

        return array($new_width, $new_height);
    }
}
