<?php

declare(strict_types=1);

namespace GildedRose\Specification;

use GildedRose\Decorator\ItemSpecification;
use GildedRose\Item;

class IsNormalItemSpecification implements ItemSpecification
{
    public function isSatisfiedBy(Item $item): bool
    {
        $isBrie = (new BrieSpecification())->isSatisfiedBy($item);
        $isBackstagePasses = (new BackstagePassesSpecification())->isSatisfiedBy($item);
        $isSulfuras = (new SulfurasSpecification())->isSatisfiedBy($item);

        return $isBrie === false
            && $isBackstagePasses === false
            && $isSulfuras === false;
    }
}
