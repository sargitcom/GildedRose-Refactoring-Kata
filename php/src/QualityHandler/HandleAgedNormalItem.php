<?php

namespace GildedRose\QualityHandler;

use GildedRose\Item;
use GildedRose\Specification\BackstagePassesSpecification;
use GildedRose\Specification\BrieSpecification;
use GildedRose\Specification\QualityIsNonZero;
use GildedRose\Specification\SellInLessThatZeroSpecification;
use GildedRose\Specification\SulfurasSpecification;

class HandleAgedNormalItem implements QualityHandlerInterface
{
    public function update(Item $item)
    {
        $isBrie = new BrieSpecification();
        $isBackstagePasses = new BackstagePassesSpecification();
        $isSulfuras = new SulfurasSpecification();
        $isQualityOverZero = new QualityIsNonZero();
        $isSellInLessThanZero = new SellInLessThatZeroSpecification();

        if (
            $isSellInLessThanZero->isSatisfiedBy($item)
            && $isQualityOverZero->isSatisfiedBy($item)
            && $isBrie->isSatisfiedBy($item) === false
            && $isBackstagePasses->isSatisfiedBy($item) === false
            && $isSulfuras->isSatisfiedBy($item) === false
        ) {
            $item->quality = $item->quality - 1;
        }
    }
}
