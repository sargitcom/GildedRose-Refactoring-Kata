<?php

declare(strict_types=1);

namespace GildedRose\ValueObject;

class Quality
{
    private int $quality;

    /**
     * Quality constructor.
     * @param int $quality
     */
    public function __construct(int $quality = 0)
    {
        if ($this->isValid($quality) === false) {
            throw new \Exception('Quality can`t be less that zero');
        }

        $this->quality = $quality;
    }

    protected function isValid(int $quality) : bool
    {
        return $quality >= 0;
    }
}
