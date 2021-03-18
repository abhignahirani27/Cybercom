<?php
namespace Block\Admin\Category\Edit\Tabs;
\Mage::getBlock("Block\Core\Template");

class Media extends \Block\Core\Template
{
    function __construct()
    {   
       $this->setTemplate('./View/admin/category/edit/tabs/media.php'); 
    }
    
}

?>