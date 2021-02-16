<?php

namespace GildedRose\QualityHandler;

use GildedRose\Item;
use GildedRose\Specification\BackstagePassesSpecification;
use GildedRose\Specification\BrieSpecification;
use GildedRose\Specification\ConjuredSpecification;
use GildedRose\Specification\QualityIsNonZero;
use GildedRose\Specification\SellInLessThatZeroSpecification;
use GildedRose\Specification\SulfurasSpecification;

class HandleConjuredItem implements QualityHandlerInterface
{
    public function update(Item $item)
    {
        $isConjured = new ConjuredSpecification();
        $isQualityOverZero = new QualityIsNonZero();

        if (
            $isConjured->isSatisfiedBy($item)
            && $isQualityOverZero->isSatisfiedBy($item)
        ) {
            $item->quality = $item->quality - 1;
        }
    }
}
