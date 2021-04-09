<?php
namespace Block\Admin\Config\Edit\Tabs;

class Form extends \Block\Core\Edit
{
    protected $config_group = NULL;
    public function __construct()
    {   
        parent::__construct();
       $this->setTemplate('./View/admin/config/edit/tabs/form.php'); 
    }
    
}

?>