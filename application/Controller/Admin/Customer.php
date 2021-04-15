<?php
namespace Controller\Admin;
\Mage::loadFileByClassName('Controller\Core\Admin');
\Mage::loadFileByClassName('Block\Core\Layout');


class Customer extends \Controller\Core\Admin{
    protected $customers = [];

    public function gridAction (){
       
        try{
            $gridHtml = \Mage::getBlock('Block\Admin\Customer\Grid')->toHtml();
            $this->makeResponse($gridHtml);

        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }
    

    public function saveAction(){

        try{
            $customer = \Mage::getModel('Model\Customer');

            if(!$this->getRequest()->isPost()){
                throw new \Exception ("Invalid Request");
            }
            if ($id = $this->getRequest()->getGet('id')) {
                $customer = $customer->load($id);
                if (!$customer){
                    throw new \Exception ("Records not found.");
                }
                $customer->updatedDate = date("Y-m-d H:i:s");

            }
            else {
                $customer->createdDate = date("Y-m-d H:i:s");
            }
            $customerData = $this->getRequest()->getPost('customer'); 
            $customer->setData($customerData);
            // echo"<pre>";
            // print_r($customer);
            // die();
            $customer->save();
            $this->getMessage()->setSuccess('Record Inserted Successfully.'); 
            $grid = \Mage::getBlock('Block\Admin\Customer\Grid')->toHtml();
            $this->makeResponse($grid);   
        }
        catch(\Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
            //echo $e->getMessage();
        }
        //$this->redirect("grid",null,null,true);
    }

    public function addressSaveAction(){
        try{
            $customerBilling = \Mage::getModel("Model\Customer");
            $customerShipping = \Mage::getModel("Model\Customer");
            $customerBilling->setTableName('customer_address');
            $customerShipping->setTableName('customer_address');
            $customerBilling->setPrimaryKey('customerId');
            $customerShipping->setPrimaryKey('customerId');
            $customerShipping->addressType = 'shipping';
            $customerBilling->addressType = 'billing';

            $customer = \Mage::getModel("Model\Customer");
            $customer->setData($_POST);
        //     echo "<pre>";
        //    print_r($customerShipping);
        //    print_r($customerBilling);
        //    die();
            foreach($customer->getData() as $key=>$value){
                if(strpos($key,'shipping') !== false){
                    $key = substr($key,8);
                    $customerShipping->$key = $value;
                }else{
                    $customerBilling->$key = $value;
                }
            }
            if($id = $this->getRequest()->getGet('id')){
                $Pid = $customer->getPrimaryKey();
                $customerBilling->$Pid = $id;
                $customerShipping->$Pid = $id;
            }
            if($customerBilling->addressSave1() && $customerShipping->addressSave1() && $id){
                $this->getMessage()->setSuccess("Update Successfully");
            }else{
                throw new \Exception("Unable To Update");
            }
        }catch(\Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
        $grid = \Mage::getBlock('Block\Admin\Customer\Grid')->toHtml();
        $this->makeResponse($grid);
        //$this->redirect("grid",null,null,true);
    }

       
    public function customerUpdateAction()
    {
        try{
            $customer = \Mage::getModel('Model\Customer');
            if ($id = (int)$this->getRequest()->getGet('id')){   
                $customer = $customer->load($id);
            }
            $leftBlock = \Mage::getBlock('Block\Admin\Customer\Edit\Tabs');
            $editBlock =  \Mage::getBlock('Block\Admin\Customer\Edit');
            $editBlock = $editBlock->setTab($leftBlock)->setTableRow($customer)->toHtml();
            $this->makeResponse($editBlock);
        
        }catch(\Exception $e){
            echo $e->getMessage();
        }
        
        //require_once './View/admin/customer/customerUpdate.php';
    }
    
    
    public function customerDeleteAction()
    {
        try{
            $id = $this->getRequest()->getGet('id');
            if(!$id){
                throw new \Exception("Invalid ID.");    
            }
            $customer = \Mage::getModel('Model\customer');
            //$customer = $this->getcustomer();
            $customer->load($id);
            if($customer->delete()) {
                $this->getMessage()->setSuccess('Record Deleted Successfully.');
            }
            else {
                $this->getMessage()->setFailure('Unable to Delete Record.');
            }
        }
        catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        } 
        $grid = \Mage::getBlock('Block\Admin\Customer\Grid')->toHtml();
        $this->makeResponse($grid); 
        //$this->redirect("grid",null,null,true);
    }
    
}


?>


