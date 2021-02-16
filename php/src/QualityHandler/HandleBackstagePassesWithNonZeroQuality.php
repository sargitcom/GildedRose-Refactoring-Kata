<?php

namespace GildedRose\QualityHandler;

use GildedRose\Item;
use GildedRose\Specification\BackstagePassesSpecification;
use GildedRose\Specification\QualityIsNonZero;

class HandleBackstagePassesWithNonZeroQuality implements QualityHandlerInterface
{
    public function update(Item $item)
    {
        $isBackstagePasses = new BackstagePassesSpecification();
        $isQualityOverZero = new QualityIsNonZero();

        if ($isBackstagePasses->isSatisfiedBy($item) && $isQualityOverZero) {
            $item->quality = $item->quality + 1;

            if ($item->sell_in < 11 and $item->quality < 50) {
                $item->quality = $item->quality + 1;
            }

            if ($item->sell_in < 6 and $item->quality < 50) {
                $item->quality = $item->quality + 1;
            }
        }
    }
}
