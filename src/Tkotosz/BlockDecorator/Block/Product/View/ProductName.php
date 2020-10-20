<?php

namespace Tkotosz\BlockDecorator\Block\Product\View;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\View\Element\Template;
use Tkotosz\BlockDecorator\View\Element\Block\CurrentProduct\ProductNameAwareInterface;

class ProductName extends Template implements ProductNameAwareInterface
{
    /**
     * @var string|null
     */
    private $productName = null;

    /**
     * @return string
     * 
     * @throws \Exception It throws exception if the product name is not configured
     */
    public function getProductName(): string
    {
        if ($this->productName === null) {
            throw new \Exception(sprintf("The '%s' block cannot be rendered without a product name", self::class));
        }

        return $this->productName;
    }

    /**
     * @param string $productName
     */
    public function setProductName(string $productName): void
    {
        $this->productName = $productName;
    }

    /**
     * @return bool
     */
    public function showBlock(): bool
    {
        return $this->productName !== null;
    }

    /**
     * Override default method to only render the block if the product name is configured
     * 
     * @return string
     */
    public function toHtml()
    {
        return $this->showBlock() ? parent::toHtml() : '';
    }
}
