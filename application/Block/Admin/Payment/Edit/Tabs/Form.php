<?php
namespace Block\Admin\Payment\Edit\Tabs;
\Mage::getBlock("Block\Core\Template");

class Form extends \Block\Core\Template
{
    protected $payment = NULL;
    public function __construct()
    {   
        parent::__construct();
       $this->setTemplate('./View/admin/payment/edit/tabs/form.php'); 
    }
    public function setPayment($payment = NULL){
        if (!$payment){
            $payment = \Mage::getModel('Model\Payment');
            if ($id = $this->getRequest()->getGet('id')){   
                $payment = $payment->load($id);
            }
            
        }
        $this->payment = $payment;
        return $this;
    }
    
    public function getPayment(){
        if (!$this->payment){
            $this->setPayment();
        }
        return $this->payment;
    }
    
}

?>