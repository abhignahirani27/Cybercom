<?php
namespace Block\Admin\Category;
\Mage::loadFileByClassName('Block\Core\Template');
\Mage::loadFileByClassName('Block\Core\Edit');


class Edit extends \Block\Core\Template
{
    protected $category = NULL;
    protected $categories = NULL;
    
    public function __construct()
    {
        parent::__construct();
       $this->setTemplate('./View/admin/category/categoryUpdate.php'); 
    }

    public function getFormUrl()
    {
        return $this->getUrl('save');
    }

    public function getTabContent()
    {
        $tabBlock = \Mage::getBlock('Block\Admin\Category\Edit\Tabs');
        $tabs = $tabBlock->getTabs();
        $tab = $this->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
        if(!array_key_exists($tab,$tabs)){
            return null;
        }
        $blockClassName = $tabs[$tab]['block'];
        $block = \Mage::getBlock($blockClassName);
        $block->toHtml();
    }

    public function setCategory($category = NULL){
        if ($category){
            $this->category = $category;
            return $this;
        }
        $category = \Mage::getModel('Model\Category');

        if ($id = $this->getRequest()->getGet('id')){   
            $category = $category->load($id);
        }
        $this->category = $category;
        
        return $this;
    }
    
    public function getCategory(){
        if (!$this->category){
            $this->setCategory();
        }
        return $this->category;
    }

    public function setCategories($categories = NULL) {
        if(!$categories) {
            $categories = \Mage::getModel('Model\Category');
            $categories = $categories->fetchAll()->getData();
        }
        $this->categories = $categories;
        return $this;
    }

    public function getCategories() {
        if (!$this->categories) {
            $this->setCategories();
        }
        return $this->categories;
    }
    
}
?>