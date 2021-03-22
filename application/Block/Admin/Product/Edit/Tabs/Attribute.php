<?php
namespace Block\Admin\Product\Edit\Tabs;

class Attribute extends \Block\Core\Edit
{
    protected $attributes = null;
    public function __construct()
    {
        $this->setTemplate('./View/admin/product/edit/tabs/attribute.php');
    }

}
?>