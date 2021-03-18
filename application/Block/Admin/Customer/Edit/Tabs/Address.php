<?php
namespace Block\Admin\Customer\Edit\Tabs;
\Mage::getBlock("Block\Core\Template");

class Address extends \Block\Core\Template
{
    protected $address = [];
    public function __construct()
    {   
       $this->setTemplate('./View/admin/customer/edit/tabs/address.php'); 
    }
    public function setAddress($address = NULL){
        if($address){
            $this->address = $address;
            return $this;
        }
        $customer = \Mage::getModel('Model\Customer');
        if($id = $this->getRequest()->getGet('id')){
            $query = "SELECT * FROM `customer_address` WHERE `customerId`={$id}";
            $array = $customer->fetchAll($query);
            // echo "<pre>";
            // print_r($array);
            // die();
            if($array){
                foreach($array as $key=>$value){
                    $this->address[] = $value->getData();
                }
            }
        }        
        // print_r($this->address);
        // die();
        return $this;
    }
    
    public function getAddress(){
        if (!$this->address){
            $this->setAddress();
        }
        return $this->address;
    } 
}



?>