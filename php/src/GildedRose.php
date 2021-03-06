<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\Decorator\ItemDecorator;
use GildedRose\Specification\BackstagePassesSpecification;
use GildedRose\Specification\BrieSpecification;
use GildedRose\Specification\IsNormalItemSpecification;
use GildedRose\Specification\QualityIsNonZero;
use GildedRose\Specification\SellInLessThatZeroSpecification;
use GildedRose\Specification\SulfurasSpecification;

final class GildedRose
{
    /**
     * @var Item[]
     */
    private $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function updateQuality(): void
    {
        $updater = new GuildedRoseUpdate();

        foreach ($this->items as $item) {
            $updater->updateQuality($item);
        }
    }
}
