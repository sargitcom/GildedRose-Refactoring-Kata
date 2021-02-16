<?php

declare(strict_types=1);

namespace GildedRose\Specification;

use GildedRose\Decorator\ItemSpecification;
use GildedRose\Item;

class SellInLessThatZeroSpecification implements ItemSpecification
{
    public function isSatisfiedBy(Item $item): bool
    {
        return $item->sell_in < 0;
    }
}
