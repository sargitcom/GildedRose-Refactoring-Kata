<?php

namespace GildedRose\QualityHandler;

use GildedRose\Item;
use GildedRose\Specification\BackstagePassesSpecification;
use GildedRose\Specification\BrieSpecification;
use GildedRose\Specification\QualityIsNonZero;
use GildedRose\Specification\SellInLessThatZeroSpecification;

class HandleAgedBackstagePasses implements QualityHandlerInterface
{
    public function update(Item $item)
    {
        $isBackstagePasses = new BackstagePassesSpecification();
        $isSellInLessThanZero = new SellInLessThatZeroSpecification();

        if (
            $isBackstagePasses->isSatisfiedBy($item)
            && $isSellInLessThanZero->isSatisfiedBy($item)
        ) {
            $item->quality = $item->quality - $item->quality;
        }
    }
}
