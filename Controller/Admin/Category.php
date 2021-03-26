<?php
namespace Controller\Admin;
\Mage::loadFileByClassName('Controller\Core\Admin');
\Mage::loadFileByClassName('Block\Core\Layout');

class Category extends \Controller\Core\Admin {
    protected $category = NULL;

   public function gridAction()
    {
        try{
            $gridBlock = \Mage::getBlock('Block\Admin\Category\Grid');
            $gridBlock->setController($this);
            $layout = $this->getLayout();
            $content = $layout->getChild('content');
            $content->addChild($gridBlock);
            $this->toHtmlLayout();

        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }
    public function saveAction()
    { 
        /*
        $category=\Mage::getModel('Model\Category'); 
        $category2=\Mage::getModel('Model\Category');
        $category3=\Mage::getModel('Model\Category');
        $categoryPathId=$category->pathId;
        $postData = $this->getRequest()->getPost('category');
        $category->setData($postData);

        if ($categoryId=$this->getRequest()->getGet('id')){
           $category2->load($categoryId);
           $category3->load($category->parentId);
           $category2->updatePathId($category3->pathId);
           $category2->updateChildrenPathIds();
        }
        else{
            $category->categoryId=$category->save();

            $parent=\Mage::getModel("Model\Category")->load($category->parentId);
            if($category->parentId){
                $category->pathId=$parent->pathId."=".$category->categoryId;
            }
            else{
              $category->pathId=$category->categoryId;
            }
         }
        $category->save();
        $this->redirect('grid',null,null,true);
         */
        try {
            $category = \Mage::getModel('Model\Category');
            if(!$this->getRequest()->isPost()){
                throw new \Exception ("Invalid Request");
            }

            if ($id = $this->getRequest()->getGet('id')) {
                $category = $category->load($id);
                $pathId = $category->pathId;
                if (!$category){
                    throw new \Exception ("Records not found.");
                }
                $categoryData = $this->getRequest()->getPost('category'); 
                $category->setData($categoryData);
                $pathId = $category->pathId;
                $category->updatePathId();
                $category->updateChildrenPathIds($pathId);
            }
            else {
                $categoryData = $this->getRequest()->getPost('category'); 
                $category->setData($categoryData);
                $id = $category->save();
                $category->load($id);
                $category->updatePathId();
            }
        } 
        catch(\Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
            //echo $e->getMessage();
        }
        $this->redirect("grid",null,null,true);
    }

    public function categoryUpdateAction()
    {
        try{
            $layout = $this->getLayout(); 
            $content = $layout->getChild('content');
            $layout->setTemplate('./View/core/layout/three_column.php');
            $category = \Mage::getModel('Model\Category');
            if ($id = (int)$this->getRequest()->getGet('id')){   
                $category = $category->load($id);
            }
            $editBlock =  \Mage::getBlock('Block\Admin\Category\Edit')->setTableRow($category);

            $content->addChild($editBlock);
            echo $this->toHtmlLayout();
        }
        catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }  
    }

    public function categoryDeleteAction()
    { 
        try {
            $category=\Mage::getModel("Model\Category");

            if ($categoryId = $this->getRequest()->getGet('id')) {
                $category = $category->load($categoryId);
                if (!$category) {
                    throw new \Exception("Id is Invalid");
                }
            }
            $pathId = $category->pathId;
            $parentId = $category->parentId;
            $category->updateChildrenPathIds($pathId, $parentId, $categoryId);
            
            $category->delete();
        }  
        catch(\Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
            //echo $e->getMessage();
        }   
        $this->redirect("grid",null,null,true);     
    }
}

?>