BlockDecorator module for Magento 2
=========================
[![License](https://poser.pugx.org/tkotosz/block-decorator-magento2/license)](https://packagist.org/packages/tkotosz/block-decorator-magento2)
[![Latest Stable Version](https://poser.pugx.org/tkotosz/block-decorator-magento2/version)](https://packagist.org/packages/tkotosz/block-decorator-magento2)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/tkotosz/block-decorator-magento2/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/tkotosz/block-decorator-magento2/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/tkotosz/block-decorator-magento2/badges/build.png?b=master)](https://scrutinizer-ci.com/g/tkotosz/block-decorator-magento2/build-status/master)

This module allows it to decorate Blocks used in the layout with extra data based on interfaces implemented by the blocks.

Installation
------------

Install by adding to your `composer.json`:

```bash
composer require tkotosz/block-decorator-magento2
```

How it works?
------------
The module registers an "after plugin" for the `Magento\Framework\View\Element\BlockFactory` which used by Magento to instantiate Blocks. In this plugin the block object created by the factory passed over to all registered decorators to decorate the block with extra data if needed. Each decorator is responsible for checking the type of the block and decide whether it needs to do anything.

How to use?
------------
1. Create an interface which can be implemented by any block to get a specific data. (example: `Tkotosz\BlockDecorator\View\Element\Block\CurrentProduct\ProductNameAwareInterface`)

2. Create your block class in the same way as you do it normally and implement your interface created in the 1st step. (example: `Tkotosz\BlockDecorator\Block\Product\View\ProductName`)

3. Create your own decorator which can decorate the blocks with the required data when applicable (when your interface is implemented by the block). To create a the decorator you just need to create a new class which implements the `Tkotosz\BlockDecorator\View\Element\Block\Decorator\DecoratorInterface`. (example: `Tkotosz\BlockDecorator\View\Element\Block\Decorator\CurrentProductName`)

4. Register your decorator in the Magento di like this:
```
<type name="Tkotosz\BlockDecorator\View\Element\Block\Decorator\Container">
    <arguments>
        <argument xsi:type="array" name="decorators">
            <item name="your_awesome_decorator" xsi:type="object">Your\Awesome\Decorator</item>
        </argument>
    </arguments>
</type>
```
(example: see how `Tkotosz\BlockDecorator\View\Element\Block\Decorator\CurrentProductName` is registered in the `src/etc/di.xml`)

5. Add your new block to any layout, when the block is instantiated your decorator will run to set the required data, which later can be used when the block is rendered. 
