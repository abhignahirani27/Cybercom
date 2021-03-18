<?php
namespace Block\Admin\CmsPage;
\Mage::loadFileByClassName('Block\Core\Template');

class Edit extends \Block\Core\Template
{
    protected $cmsPage = NULL;

    public function __construct() {
        $this->setTemplate('./View/admin/cmsPage/cmsPageUpdate.php');
    }

    public function setCmsPage($cmsPage = NULL){
        if (!$cmsPage){
            $cmsPage = \Mage::getModel('Model\CmsPage');
            if($id = $this->getRequest()->getGet('id')){
                $cmsPage = $cmsPage->load($id);
            }
        }
        $this->cmsPage = $cmsPage;
        return $this;
    }
    
    public function getCmsPage(){
        if (!$this->cmsPage){
            $this->setCmsPage();
        }
        return $this->cmsPage;
    }

    
}




?>