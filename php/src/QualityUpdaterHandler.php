<?php

namespace GildedRose;

use GildedRose\QualityHandler\QualityHandlerInterface;

class QualityUpdaterHandler
{
    protected array $_chain;

    public function addElement(QualityHandlerInterface $element) {
        $this->_chain[] = $element;
    }

    public function handle(Item $item)
    {
        if (empty($this->_chain)) {
            throw new \Exception('No processing elements defined');
        }

        foreach ($this->_chain as $element) {
            $element->update($item);
        }
    }
}
