<?php

namespace Tkotosz\BlockDecorator\View\Element\Block\Decorator;

use Magento\Framework\View\Element\BlockInterface;

interface DecoratorInterface
{
    public function decorate(BlockInterface $block): void;
}
