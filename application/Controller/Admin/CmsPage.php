<?php
namespace Controller\Admin;
\Mage::loadFileByClassName('Controller\Core\Admin');
\Mage::loadFileByClassName('Block\Core\Layout');


class CmsPage extends \Controller\Core\Admin{
    protected $cmsPages = [];

    public function gridAction (){
       
        try{
            $gridHtml = \Mage::getBlock('Block\Admin\CmsPage\Grid')->toHtml();
            $this->makeResponse($gridHtml);

        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }
    
    public function saveAction(){

        try{
            $cmsPage = \Mage::getModel('Model\CmsPage');

            if(!$this->getRequest()->isPost()){
                throw new \Exception ("Invalid Request");
            }
            if ($id = $this->getRequest()->getGet('id')) {
                $cmsPage = $cmsPage->load($id);
                if (!$cmsPage){
                    throw new \Exception ("Records not found.");
                }
                // $cmsPage->updatedDate = date("Y-m-d H:i:s");
            }
            else {
                $cmsPage->createdDate = date("Y-m-d H:i:s");
            }
            $cmsPageData = $this->getRequest()->getPost('cmsPage'); 
            $cmsPage->setData($cmsPageData);
            $cmsPage->save();
            $this->getMessage()->setSuccess('Record Inserted Successfully.');  
            $grid = \Mage::getBlock('Block\Admin\CmsPage\Grid')->toHtml();
            $this->makeResponse($grid);  
        }
        catch(\Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
            //echo $e->getMessage();
        }
        //$this->redirect("grid",null,null,true);
    }
       
    public function cmsPageUpdateAction()
    {
        try{
            $cmsPage = \Mage::getModel('Model\CmsPage');
            if ($id = (int)$this->getRequest()->getGet('id')){   
                $cmsPage = $cmsPage->load($id);
            }
            $leftBlock = \Mage::getBlock('Block\Admin\CmsPage\Edit\Tabs');
            $editBlock =  \Mage::getBlock('Block\Admin\CmsPage\Edit');
            $editBlock = $editBlock->setTab($leftBlock)->setTableRow($cmsPage)->toHtml();
            $this->makeResponse($editBlock);
        
        }catch(\Exception $e){
            echo $e->getMessage();
        }
        
        //require_once './View/admin/cmsPage/cmsPageUpdate.php';
        
    }
    
    
    public function cmsPageDeleteAction()
    {
        try{
            $id = $this->getRequest()->getGet('id');
            if(!$id){
                throw new \Exception("Invalid ID.");    
            }
            $cmsPage = \Mage::getModel('Model\CmsPage');
            //$cmsPage = $this->getcmsPage();
            $cmsPage->load($id);
            if($cmsPage->delete()) {
                $this->getMessage()->setSuccess('Record Deleted Successfully.');
            }
            else {
                $this->getMessage()->setFailure('Unable to Delete Record.');
            }
        }
        catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $grid = \Mage::getBlock('Block\Admin\CmsPage\Grid')->toHtml();
        $this->makeResponse($grid);  
        //$this->redirect("grid",null,null,true);
    }
    
}


?>


