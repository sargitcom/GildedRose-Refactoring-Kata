<?php

declare(strict_types=1);

namespace GildedRose\Specification;

use GildedRose\Decorator\ItemSpecification;
use GildedRose\Item;

class BrieSpecification implements ItemSpecification
{
    public function isSatisfiedBy(Item $item): bool
    {
        return $item->name === 'Aged Brie';
    }
}
