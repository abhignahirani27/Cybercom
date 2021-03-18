<?php
namespace Block\Admin\Customer\Edit\Tabs;
\Mage::getBlock("Block\Core\Template");

class Form extends \Block\Core\Template
{
    protected $customer = NULL;
    protected $group = Null;
    protected $address = null;

    public function __construct()
    {   
        parent::__construct();
       $this->setTemplate('./View/admin/customer/edit/tabs/form.php'); 
    }
    public function setCustomer($customer = NULL){
        if (!$customer){
            $customer = \Mage::getModel('Model\customer');
            if ($id = $this->getRequest()->getGet('id')){   
                $customer = $customer->load($id);
            }
            
        }
        $this->customer = $customer;
        return $this;
    }
    
    public function getCustomer(){
        if (!$this->customer){
            $this->setCustomer();
        }
        return $this->customer;
    }

    public function setGroup($group = null){
        if($group == null){
            $group = $this->getCustomer()->getAdapter()->fetchAll("SELECT `name`, `groupId` FROM `customer_group`");
        }
        $this->group = $group;
        return $this;
    }

    public function getGroup(){
        if(!$this->group){
            $this->setGroup();
        }
        return $this->group;
    }    
}

?>