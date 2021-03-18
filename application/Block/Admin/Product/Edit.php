<?php

namespace Block\Admin\Product;
\Mage::loadFileByClassName('Block\Core\Template');


class Edit extends \Block\Core\Template
{
    protected $product = NULL;
    
    public function __construct()
    {
       parent::__construct();
       $this->setTemplate('./View/admin/product/productUpdate.php'); 
    }
    public function getTabContent()
    {
        $tabBlock = \Mage::getBlock('Block\Admin\Product\Edit\Tabs');
        $tabs = $tabBlock->getTabs();
        $tab = $this->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
        if(!array_key_exists($tab,$tabs)){
            return null;
        }
        $blockClassName = $tabs[$tab]['block'];
        $block = \Mage::getBlock($blockClassName);
        $block->toHtml();
    }
    
}
?>