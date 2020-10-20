<?php

namespace Tkotosz\BlockDecorator\View\Element\Block\CurrentProduct;

interface ProductNameAwareInterface
{
    /**
     * @param string $productName
     */
    public function setProductName(string $productName): void;
}
