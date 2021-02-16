<?php

declare(strict_types=1);

namespace GildedRose\Decorator;

use GildedRose\Item;

class ItemDecorator
{
    private Item $item;

    /**
     * ItemDecorator constructor.
     * @param Item $item
     */
    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function raiseQuality() : void
    {
        $this->item->quality += 1;
    }

    public function dropQuality() : void
    {
        $this->item->quality -= 1;

        if ($this->item->quality < 0) {
            $this->item->quality = 0;
        }
    }

    public function dropSellIn() : void
    {
        $this->item->sell_in -= 1;
    }

    public function getQuality() : int
    {
        return $this->item->quality;
    }

    public function getSellIn() : int
    {
        return $this->item->sell_in;
    }

    public function getName() : string
    {
        return $this->item->name;
    }
}
