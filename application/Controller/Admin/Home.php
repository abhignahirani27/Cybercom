<?php
namespace Controller\Admin;
\Mage::loadFileByClassName('Controller\Core\Admin');
\Mage::loadFileByClassName('Block\Core\Layout');

class Home extends \Controller\Core\Admin{
    
    public function pageAction()
    {
        $pager = \Mage::getController('Controller\Core\Pager');
        
        $sql = "SELECT * FROM product;";
        $product = \Mage::getModel('Model\Product');
        $productCount = $product->getAdapter()->fetchOne($sql);
        
        $pager->setTotalRecords($productCount);
        $pager->setRecordPerPage(2);
        $pager->setCurrentPage($_GET['p']);
        $pager->calculate();
        echo "<pre>";
        print_r($pager);

    }
}