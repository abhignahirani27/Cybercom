<?php
namespace Block\Admin\Product;
\Mage::loadFileByClassName('Block\Core\Template');
\Mage::loadFileByClassName('Model\Product');

class Grid extends \Block\Core\Template{
    protected $products = [];

    public function __construct()
    {
       $this->setTemplate('./View/admin/product/grid.php'); 
    }

    public function setProducts($products =NULL) {

            if(!$products) {
                $products = \Mage::getModel('Model\Product');
                $products = $products->fetchAll();
            }
            $this->products = $products;
            return $this;
    }

    public function getProducts() {
        if (!$this->products) {
            $this->setProducts();
        }
        return $this->products;
    }

}