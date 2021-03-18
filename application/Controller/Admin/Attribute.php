<?php
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');

class Attribute extends \Controller\Core\Admin
{

    public function gridAction()
    {
        $grid = \Mage::getBlock('Block\Admin\Attribute\Grid');

        $layout = $this->getLayout();
        $layout->getContent()->addChild($grid);
        echo $layout->toHtml();
    }

    public function attributeUpdateAction()
    {
        $edit = \Mage::getBlock('Block\Admin\Attribute\Edit');

        $layout = $this->getLayout()->setTemplate('View/core/layout/three_column.php');
        $layout->getContent()->addChild($edit);
        $layout->getLeft()->addChild(\Mage::getBlock('Block\Admin\Attribute\Edit\Tabs'));
        echo $layout->toHtml();
    }

    public function saveAction()
    {
        $attribute = \Mage::getModel('Model\Attribute');
        $data = $this->getRequest()->getPost('attribute');
        if ($id = $this->getRequest()->getGet('id')) {
            echo 2;
            $attribute->load($id)->getData($data);
            $attribute->attributeId = $id;
        }
        $attribute->setData($data);
        $attribute->save();
        $this->redirect('grid', null, null, true);
    }

    public function optionAction()
    {
        $option = \Mage::getModel('Model\Attribute\Option');
        if ($id = $this->getRequest()->getGet('optionId')) {
            $option->load($id);
        }
        $optionBlock = \Mage::getBlock('Block\Admin\Attribute\Edit\Tabs\Option');
        $optionBlock->setAttribute($option);
        $layout = $this->getLayout();
        $layout->getContent()->addChild($optionBlock);
        echo $layout->toHtml();
    }

    public function updateAction()
    {
        $this->redirect('grid', null, null, true);
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
        $this->redirect('grid', null, null, true);
    }
}
