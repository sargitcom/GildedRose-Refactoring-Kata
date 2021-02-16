<?php

namespace GildedRose\QualityHandler;

use GildedRose\Item;
use GildedRose\Specification\SulfurasSpecification;

class HandleNonSulfurasItem implements QualityHandlerInterface
{
    public function update(Item $item)
    {
        $isSulfuras = new SulfurasSpecification();

        if ($isSulfuras->isSatisfiedBy($item) === false) {
            $item->sell_in = $item->sell_in - 1;
        }
    }
}
