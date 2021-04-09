<?php
namespace Controller\Admin\Config;

class Group extends \Controller\Core\Admin{
    protected $config_groups = [];
    
    
    public function gridAction (){
       
        try{
            $gridBlock = \Mage::getBlock('Block\Admin\Config\Grid');
            $gridBlock->setController($this);
            $layout = $this->getLayout();
            $content = $layout->getChild('content');
            $content->addChild($gridBlock);
            $this->toHtmlLayout();

        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }
    

    
    public function saveAction(){

        try{
            $config_group = \Mage::getModel('Model\Config\Group');

            if(!$this->getRequest()->isPost()){
                throw new \Exception ("Invalid Request");
            }
            if ($id = $this->getRequest()->getGet('id')) {
                $config_group = $config_group->load($id);
                if (!$config_group){
                    throw new \Exception ("Records not found.");
                }
                $config_group->createdDate = date("Y-m-d H:i:s");

            }      
            $config_groupData = $this->getRequest()->getPost('config_group'); 
            $config_group->setData($config_groupData);
            $config_group->save();
            $this->getMessage()->setSuccess('Record Inserted Successfully.');    
        }
        catch(\Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
            //echo $e->getMessage();
        }
        $this->redirect("grid",null,null,true);
    }
       
    public function config_groupUpdateAction()
    {
        try{
            
            $layout = $this->getLayout();
            $content = $layout->getChild('content');
            $config_group = \Mage::getModel('Model\Config\Group');
            if ($id = $this->getRequest()->getGet('id')){   
                $config_group = $config_group->load($id);
            }   
            $gridBlock = \Mage::getBlock('Block\Admin\Config\Edit')->setTableRow($config_group);
            //$layout->getLeft()->addChild(\Mage::getBlock('Block\Admin\config_group\Edit\Tabs'));
            $layout->setTemplate('./View/core/layout/three_column.php');
            $content->addChild($gridBlock);
            $this->toHtmlLayout();
        
        }catch(\Exception $e){
            echo $e->getMessage();
        }
        
        //require_once './View/admin/config_group/config_groupUpdate.php';
        
    }
    
    
    public function config_groupDeleteAction()
    {
        try{
            $id = $this->getRequest()->getGet('id');
            if(!$id){
                throw new \Exception("Invalid ID.");    
            }
            $config_group = \Mage::getModel('Model\Config\Group');
            //$config_group = $this->getconfig_group();
            $config_group->load($id);
            if($config_group->delete()) {
                $this->getMessage()->setSuccess('Record Deleted Successfully.');
            }
            else {
                $this->getMessage()->setFailure('Unable to Delete Record.');
            }
        }
        catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }  
        $this->redirect("grid",null,null,true);
    }
    
}


?>





