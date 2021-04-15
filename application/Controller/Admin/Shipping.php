<?php
namespace Controller\Admin;
\Mage::loadFileByClassName('Controller\Core\Admin');
\Mage::loadFileByClassName('Block\Core\Layout');


class Shipping extends \Controller\Core\Admin{
    protected $shippings = [];

    public function gridAction (){
       
        try{
            $gridHtml = \Mage::getBlock('Block\Admin\Shipping\Grid')->toHtml();
            $this->makeResponse($gridHtml);

        }catch(\Exception $e){
            $e->getMessage();
        }
    }
    

    
    public function saveAction(){

        try{
            $shipping = \Mage::getModel('Model\Shipping');

            if(!$this->getRequest()->isPost()){
                throw new \Exception ("Invalid Request");
            }
            if ($id = $this->getRequest()->getGet('id')) {
                $shipping = $shipping->load($id);
                if (!$shipping){
                    throw new \Exception ("Records not found.");
                }
                $shipping->updatedDate = date("Y-m-d H:i:s");

            }
            else {
                $shipping->createdDate = date("Y-m-d H:i:s");
            }
            $shippingData = $this->getRequest()->getPost('shipping'); 
            $shipping->setData($shippingData);
            $shipping->save();
            $this->getMessage()->setSuccess('Record Inserted Successfully.');
            $grid = \Mage::getBlock('Block\Admin\Shipping\Grid')->toHtml(); 
            $this->makeResponse($grid);    
        }
        catch(\Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
            //echo $e->getMessage();
        }
        //$this->redirect("grid",null,null,true);
    }
       
    public function shippingUpdateAction()
    {
        try{
            $layout = $this->getLayout();
            $layout->setTemplate('./View/core/layout/three_column.php');
            $shipping = \Mage::getModel('Model\Shipping');

            if ($id = $this->getRequest()->getGet('id')){   
                $shipping = $shipping->load($id);
            }   
            $leftBlock = \Mage::getBlock('Block\Admin\Shipping\Edit\Tabs');
            $editBlock =  \Mage::getBlock('Block\Admin\Shipping\Edit');
            $editBlock = $editBlock->setTab($leftBlock)->setTableRow($shipping)->toHtml();
            $this->makeResponse($editBlock);
            
        }catch(\Exception $e){
            echo $e->getMessage();
        }
        
        
    }
    
    
    public function shippingDeleteAction()
    {
        try{
            $id = $this->getRequest()->getGet('id');
            if(!$id){
                throw new \Exception("Invalid ID.");    
            }
            $shipping = \Mage::getModel('Model\Shipping');
            //$shipping = $this->getshipping();
            $shipping->load($id);
            if($shipping->delete()) {
                $this->getMessage()->setSuccess('Record Deleted Successfully.');
            }
            else {
                $this->getMessage()->setFailure('Unable to Delete Record.');
            }
        }
        catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }  
        //$this->redirect("grid",null,null,true);
        $grid = \Mage::getBlock('Block\Admin\Shipping\Grid')->toHtml();
        $this->makeResponse($grid);
    }
    
}


?>


