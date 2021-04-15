<?php
namespace Controller\Admin;
\Mage::loadFileByClassName('Controller\Core\Admin');
\Mage::loadFileByClassName('Block\Core\Layout');


class Admin extends \Controller\Core\Admin{
    protected $admins = [];

    public function gridAction (){
       
        try{
            $gridHtml = \Mage::getBlock('Block\Admin\Admin\Grid')->toHtml();
            $this->makeResponse($gridHtml);

        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }
    
    
    public function saveAction(){

        try{
            $admin = \Mage::getModel('Model\Admin');

            if(!$this->getRequest()->isPost()){
                throw new \Exception ("Invalid Request");
            }
            if ($id = $this->getRequest()->getGet('id')) {
                $admin = $admin->load($id);
                if (!$admin){
                    throw new \Exception ("Records not found.");
                }
                $admin->updatedDate = date("Y-m-d H:i:s");

            }
            else {
                $admin->createdDate = date("Y-m-d H:i:s");
            }
            $adminData = $this->getRequest()->getPost('admin'); 
            $admin->setData($adminData);
            $admin->save();
            //print_r($admin);die;
            $this->getMessage()->setSuccess('Record Inserted Successfully.');  
            $grid = \Mage::getBlock('Block\Admin\Admin\Grid')->toHtml();
            $this->makeResponse($grid);  

        }
        catch(\Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
            //echo $e->getMessage();
        }
        //$this->redirect("grid",null,null,true);
    }
       
    public function adminUpdateAction()
    {
        try{
            $admin = \Mage::getModel('Model\Admin');
            if ($id = $this->getRequest()->getGet('id')){   
                $admin = $admin->load($id);
            }
            $leftBlock = \Mage::getBlock('Block\Admin\Admin\Edit\Tabs');
            $editBlock =  \Mage::getBlock('Block\Admin\Admin\Edit');
            $editBlock = $editBlock->setTab($leftBlock)->setTableRow($admin)->toHtml();
            $this->makeResponse($editBlock);
        
        }catch(\Exception $e){
            echo $e->getMessage();
        }
        
        //require_once './View/admin/admin/adminUpdate.php';
    }
    
    
    public function adminDeleteAction()
    {
        try{
            $id = $this->getRequest()->getGet('id');
            if(!$id){
                throw new \Exception("Invalid ID.");    
            }
            $admin = \Mage::getModel('Model\Admin');
            //$admin = $this->getadmin();
            $admin->load($id);
            if($admin->delete()) {
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
        $grid = \Mage::getBlock('Block\Admin\Admin\Grid')->toHtml();
        $this->makeResponse($grid);

    }
    
}


?>


