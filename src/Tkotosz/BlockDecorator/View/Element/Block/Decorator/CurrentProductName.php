<?php

namespace Tkotosz\BlockDecorator\View\Element\Block\Decorator;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\Registry;
use Magento\Framework\View\Element\BlockInterface;
use Tkotosz\BlockDecorator\View\Element\Block\CurrentProduct\ProductNameAwareInterface;
use Tkotosz\BlockDecorator\View\Element\Block\Decorator\DecoratorInterface;

class CurrentProductName implements DecoratorInterface
{
    private const REGISTRY_KEY_CURRENT_PRODUCT = 'current_product';

    /**
     * @var Registry
     */
    private $productRegistry;
    
    /**
     * @param Registry $productRegistry
     */
    public function __construct(Registry $productRegistry)
    {
        $this->productRegistry = $productRegistry;
    }
    
    public function decorate(BlockInterface $block): void
    {
        if ($block instanceof ProductNameAwareInterface) {
            $this->setCurrentProduct($block);
        }
    }

    private function setCurrentProduct(ProductNameAwareInterface $block): void
    {
        $product = $this->productRegistry->registry(self::REGISTRY_KEY_CURRENT_PRODUCT);

        if ($product instanceof ProductInterface) {
            $block->setProductName($product->getName() ?? '');
        }
    }
}
