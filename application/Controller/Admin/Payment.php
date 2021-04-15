<?php
namespace Controller\Admin;
\Mage::loadFileByClassName('Controller\Core\Admin');
\Mage::loadFileByClassName('Block\Core\Layout');


class Payment extends \Controller\Core\Admin{
    protected $payments = [];

    public function gridAction (){
        
        $gridHtml = \Mage::getBlock('Block\Admin\Payment\Grid')->toHtml();
        $this->makeResponse($gridHtml);
        // $response = [
		// 	'status' => 'Success',
		// 	'message' => 'u r excellent',
		// 	'element' => [
		// 		'selector' => '#content',
        //         'html' => $gridHtml
		// 	]
		// ];
		// header('Content-Type: application/json');
		// echo json_encode($response);
       
        // try{
        //     $gridBlock = \Mage::getBlock('Block\Admin\Payment\Grid');
        //     $gridBlock->setController($this);
        //     $layout = $this->getLayout();
        //     $content = $layout->getChild('content');
        //     $content->addChild($gridBlock);
        //     $this->toHtmlLayout();

        // }catch(\Exception $e){
        //     echo $e->getMessage();
        // }
    }
    

    
    public function saveAction(){

        try{
            $payment = \Mage::getModel('Model\Payment');

            if(!$this->getRequest()->isPost()){
                throw new \Exception ("Invalid Request");
            }
            if ($id = $this->getRequest()->getGet('id')) {
                $payment = $payment->load($id);
                if (!$payment){
                    throw new \Exception ("Records not found.");
                }
                $payment->updatedDate = date("Y-m-d H:i:s");

            }
            else {
                $payment->createdDate = date("Y-m-d H:i:s");
            }
            $paymentData = $this->getRequest()->getPost('payment'); 
            $payment->setData($paymentData);
            $payment->save();
            $this->getMessage()->setSuccess('Record Inserted Successfully.'); 
        }
        catch(\Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
        $grid = \Mage::getBlock('Block\Admin\Payment\Grid')->toHtml(); 
        $this->makeResponse($grid);
        //$this->redirect("grid",null,null,true);
        //$this->gridAction();
    }
       
    public function paymentUpdateAction()
    {
       
        try{
            $layout = $this->getLayout();
            $layout->setTemplate('./View/core/layout/three_column.php');
            $payment = \Mage::getModel('Model\Payment');

            if ($id = $this->getRequest()->getGet('id')){   
                $payment = $payment->load($id);
            }   

            $leftBlock = \Mage::getBlock('Block\Admin\Payment\Edit\Tabs');
            $editBlock = \Mage::getBlock('Block\Admin\Payment\Edit');
            $editBlock = $editBlock->setTab($leftBlock)->setTableRow($payment)->toHtml();
            $this->makeResponse($editBlock);
            
            // $layout = $this->getLayout();
            // $content = $layout->getChild('content');
            // $payment = \Mage::getModel('Model\Payment');
            // if ($id = $this->getRequest()->getGet('id')){   
            //     $payment = $payment->load($id);
            // }   
            // $gridBlock = \Mage::getBlock('Block\Admin\Payment\Edit')->setTableRow($payment);
            // //$layout->getLeft()->addChild(\Mage::getBlock('Block\Admin\Payment\Edit\Tabs'));
            // $layout->setTemplate('./View/core/layout/three_column.php');
            // $content->addChild($gridBlock);
            // $this->toHtmlLayout();
        
        }catch(\Exception $e){
            echo $e->getMessage();
        }
        
        //require_once './View/admin/payment/paymentUpdate.php';
        
    }
    
    
    public function paymentDeleteAction()
    {
        try{
            $id = $this->getRequest()->getGet('id');
            if(!$id){
                throw new \Exception("Invalid ID.");    
            }
            $payment = \Mage::getModel('Model\Payment');
            //$payment = $this->getPayment();
            $payment->load($id);
            if($payment->delete()) {
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
        $grid = \Mage::getBlock('Block\Admin\Payment\Grid')->toHtml();
        $this->makeResponse($grid);
    }
    
}


?>





