<?php
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');

class Attribute extends \Controller\Core\Admin
{
            
    public function gridAction()
    {
        $gridHtml = \Mage::getBlock('Block\Admin\Attribute\Grid')->toHtml();
        $this->makeResponse($gridHtml);
    }

    public function attributeUpdateAction()
    {
        $attribute = \Mage::getModel('Model\Attribute');
            if ($id = (int)$this->getRequest()->getGet('id')){   
                $attribute = $attribute->load($id);
            }
        $leftBlock = \Mage::getBlock('Block\Admin\Attribute\Edit\Tabs');
        $editBlock = \Mage::getBlock('Block\Admin\Attribute\Edit');
        $editBlock = $editBlock->setTab($leftBlock)->setTableRow($attribute)->toHtml();
        $this->makeResponse($editBlock);
    }

    public function saveAction()
    {
        $attribute = \Mage::getModel('Model\Attribute');
        $data = $this->getRequest()->getPost('attribute');
        if ($id = $this->getRequest()->getGet('id')) {
            $attribute->load($id)->getData($data);
            $attribute->attributeId = $id;
        }
        $attribute->setData($data);
        $attribute->save();
        $grid = \Mage::getBlock('Block\Admin\Attribute\Grid')->toHtml();
        $this->makeResponse($grid);
        //$this->redirect('grid', null, null, true);
    }

    public function  attributeDeleteAction()
    {
        $id = $this->getRequest()->getGet('id');

        $attribute = \Mage::getBlock("Model\Attribute");

        $attribute->load($id);

        if ($id != $attribute->attributeId) {
            throw new \Exception('Id is Invalid');
        }
        $attribute->delete();
        $grid = \Mage::getBlock('Block\Admin\Attribute\Grid')->toHtml();
        $this->makeResponse($grid);
        //$this->redirect('grid', null, null, true);
    }

}
