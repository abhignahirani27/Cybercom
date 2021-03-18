<?php

namespace Block\Admin\Product\Edit\Tabs;

\Mage::getBlock("Block\Core\Template");

class Category extends \Block\Core\Template
{
    function __construct()
    {   
       $this->setTemplate('./View/admin/product/edit/tabs/category.php'); 
    }
}

?>