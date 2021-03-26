<?php

namespace Block\Admin\Product\Edit\Tabs;

\Mage::getBlock("Block\Core\Edit");

class Category extends \Block\Core\Edit
{
    function __construct()
    {   
       $this->setTemplate('./View/admin/product/edit/tabs/category.php'); 
    }
}

?>