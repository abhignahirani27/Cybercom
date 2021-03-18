<?php
namespace Block\Admin\Admin;
\Mage::loadFileByClassName('Block\Core\Template');

class Edit extends \Block\Core\Template
{
    protected $admin = NULL;

    public function __construct() {
        $this->setTemplate('./View/admin/admin/adminUpdate.php');
    }

    public function setAdmin($admin = NULL){
        if (!$admin){
            $admin = \Mage::getModel('Model\Admin');
            if($id = $this->getRequest()->getGet('id')){
                $admin = $admin->load($id);
            }
        }
        $this->admin = $admin;
        return $this;
    }
    
    public function getAdmin(){
        if (!$this->admin){
            $this->setAdmin();
        }
        return $this->admin;
    }

    
}



?>