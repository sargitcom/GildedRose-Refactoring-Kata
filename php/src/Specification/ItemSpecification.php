<?php

declare(strict_types=1);

namespace GildedRose\Decorator;

use GildedRose\Item;

interface ItemSpecification
{
    public function isSatisfiedBy(Item $package): bool;
}
