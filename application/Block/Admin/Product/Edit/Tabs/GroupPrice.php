<?php

namespace Block\Admin\Product\Edit\Tabs;
\Mage::getBlock("Block\Core\Template");

class GroupPrice extends \Block\Core\Template
{
    protected $product = null;
    protected $customerGroup = null;
    
    function __construct()
    {   
       $this->setTemplate('./View/admin/product/edit/tabs/groupPrice.php'); 
    }

    public function setProduct(\Model\Product $product)
    {
        $this->product = $product;
        return $this;
    }

    public function getProduct()
    {   
        if (!$this->product){
            $this->setProduct();
         }
        return $this->product;
    }

    public function getCustomerGroup()
    {
        $query = "SELECT cg.*, pgp.productId, pgp.entityId, pgp.price as groupPrice, 
        if (p.price IS NULL, '{$this->getProduct()->price}', p.price) as price
        FROM customer_group cg
        LEFT JOIN product_group_price pgp
            ON pgp.customerGroupId = cg.groupId
                AND pgp.productId = '{$this->getProduct()->productId}'
        LEFT JOIN product p
            ON pgp.productId = p.productId      
        ;";

        $customerGroups = \Mage::getModel('Model\CustomerGroup');
        return $customerGroups->fetchAll($query)->getData();
    }
}

?>