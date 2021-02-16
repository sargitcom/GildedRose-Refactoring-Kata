<?php

namespace GildedRose\QualityHandler;

use GildedRose\Item;
use GildedRose\Specification\BrieSpecification;
use GildedRose\Specification\QualityIsNonZero;

class HandleBrieItemWithNonZeroQuality implements QualityHandlerInterface
{
    public function update(Item $item)
    {
        $isBrie = new BrieSpecification();
        $isQualityOverZero = new QualityIsNonZero();

        if (
            $isBrie->isSatisfiedBy($item)
            && $isQualityOverZero
        ) {
            $item->quality = $item->quality + 1;
        }
    }
}
