<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\Decorator\ItemDecorator;
use GildedRose\QualityHandler\HandleNormalItemWithNonZeroQuality;
use GildedRose\Specification\BackstagePassesSpecification;
use GildedRose\Specification\BrieSpecification;
use GildedRose\Specification\IsNormalItemSpecification;
use GildedRose\Specification\QualityIsNonZero;
use GildedRose\Specification\SellInLessThatZeroSpecification;
use GildedRose\Specification\SulfurasSpecification;

class GuildedRoseUpdate
{
    public function updateQuality(Item $item): void
    {
        $handlers = require_once(__DIR__ . '/config/handlers.php');

        $updaterHandler = new QualityUpdaterHandler();

        foreach ($handlers as $handle) {
            $updaterHandler->addElement(new $handle());
        }

        $updaterHandler->handle($item);
    }
}
