<?php

namespace Tkotosz\BlockDecorator\Plugin;

use Magento\Framework\View\Element\BlockFactory;
use Magento\Framework\View\Element\BlockInterface;
use Tkotosz\BlockDecorator\View\Element\Block\Decorator\Container as BlockDecoratorContainer;

class ApplyDecorators
{
    /**
     * @var BlockDecoratorContainer
     */
    private $blockDecoratorContainer;
    
    /**
     * @param BlockDecoratorContainer $blockDecoratorContainer
     */
    public function __construct(BlockDecoratorContainer $blockDecoratorContainer)
    {
        $this->blockDecoratorContainer = $blockDecoratorContainer;
    }
    
    /**
     * @param BlockFactory   $blockFactory
     * @param BlockInterface $block
     *
     * @return BlockInterface
     */
    public function afterCreateBlock(BlockFactory $blockFactory, BlockInterface $block)
    {
        foreach ($this->blockDecoratorContainer->getDecorators() as $decorator) {
            $decorator->decorate($block);
        }

        return $block;
    }
}
