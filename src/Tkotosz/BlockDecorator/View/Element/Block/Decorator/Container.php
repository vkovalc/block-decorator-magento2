<?php

namespace Tkotosz\BlockDecorator\View\Element\Block\Decorator;

use Tkotosz\BlockDecorator\View\Element\Block\Decorator\DecoratorInterface;

class Container
{
    /**
     * @var DecoratorInterface[]
     */
    private $decorators = [];
    
    /**
     * @param DecoratorInterface[] $decorators
     */
    public function __construct(array $decorators = [])
    {
        $this->setDecorators($decorators);
    }

    /**
     * @param DecoratorInterface[] $decorators
     */
    public function setDecorators(array $decorators): void
    {
        foreach ($decorators as $decorator) {
            $this->addDecorator($decorator);
        }
    }

    /**
     * @param DecoratorInterface $decorator
     */
    public function addDecorator(DecoratorInterface $decorator): void
    {
        $this->decorators[] = $decorator;
    }
    
    /**
     * @return DecoratorInterface[]
     */
    public function getDecorators(): array
    {
        return $this->decorators;
    }
}
