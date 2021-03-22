<?php
namespace Block\Admin\Category\Edit\Tabs;
\Mage::getBlock("Block\Core\Edit");

class Media extends \Block\Core\Edit
{
    function __construct()
    {   
       $this->setTemplate('./View/admin/category/edit/tabs/media.php'); 
    }
    
}

?>