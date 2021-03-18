<?php

namespace Block\Admin\Payment;
\Mage::loadFileByClassName('Block\Core\Template');


class Edit extends \Block\Core\Template
{
    protected $payment = NULL;
    
    public function __construct()
    {
       parent::__construct();
       $this->setTemplate('./View/admin/payment/paymentUpdate.php'); 
    }
    public function getTabContent()
    {
        $tabBlock = \Mage::getBlock('Block\Admin\Payment\Edit\Tabs');
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