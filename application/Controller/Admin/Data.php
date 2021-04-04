<?php 
namespace Controller\Admin;

class Data extends \Controller\Core\Admin{
    public function testAction()
    {
        $product = \Mage::getModel('Model\Product');
        echo "<pre>";
        $query = "SELECT * FROM `product`
        where `productId` = 58
        ORDER BY `productId` ASC";
        $product = $product->fetchRow($query);
        $product->sku = "12ad";
        $product->name = "product1";
        print_r($product);

    }
}