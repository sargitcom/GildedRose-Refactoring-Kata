<?php
namespace GildedRose\QualityHandler;

use GildedRose\Item;
use GildedRose\Specification\IsNormalItemSpecification;
use GildedRose\Specification\QualityIsNonZero;

class HandleNormalItemWithNonZeroQuality implements QualityHandlerInterface
{
    public function update(Item $item)
    {
        $isNormalItem = new IsNormalItemSpecification();
        $isQualityOverZero = new QualityIsNonZero();

        if (
            $isNormalItem->isSatisfiedBy($item)
            && $isQualityOverZero->isSatisfiedBy($item)
        ) {
            $item->quality = $item->quality - 1;
        }
    }
}
