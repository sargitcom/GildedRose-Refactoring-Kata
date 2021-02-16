<?php

namespace GildedRose\QualityHandler;

use GildedRose\Item;
use GildedRose\Specification\BrieSpecification;
use GildedRose\Specification\QualityIsNonZero;
use GildedRose\Specification\SellInLessThatZeroSpecification;

class HandleNotAgedBrie implements QualityHandlerInterface
{
    public function update(Item $item)
    {
        $isBrie = new BrieSpecification();
        $isQualityOverZero = new QualityIsNonZero();
        $isSellInLessThanZero = new SellInLessThatZeroSpecification();

        if (
            $isBrie->isSatisfiedBy($item)
            && $isSellInLessThanZero->isSatisfiedBy($item)
            && $isQualityOverZero->isSatisfiedBy($item)
        ) {
            $item->quality = $item->quality + 1;
        }
    }
}
