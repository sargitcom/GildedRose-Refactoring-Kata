<?php

namespace GildedRose\QualityHandler;

use GildedRose\Item;

interface QualityHandlerInterface
{
    public function update(Item $item);
}
