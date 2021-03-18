<?php
namespace Controller\Admin\Product;
\Mage::loadFileByClassName('Controller\Core\Admin');

class GroupPrice extends \Controller\Core\Admin
{
    public function indexAction()
    {
        try{
            $productId = (int)$this->getRequest()->getGet('id');
            $product = \Mage::getModel('Model\Product')->load($productId);
            
            if (!$product) {
                throw new \Exception("Record Not Found", 1);
           }

            $layout = $this->getLayout();
            $layout->setTemplate('./View/core/layout/three_column.php');
            $grid = \Mage::getBlock('Block\Admin\Product\Edit\Tabs\GroupPrice')->setProduct($product);
            $content = $layout->getContent()->addChild($grid);
            $this->toHtmlLayout();

        } catch (Exception $e){
            echo $e->getMessage();
        }
    }

    public function saveAction()
    {
        $groupData = $this->getRequest()->getPost('groupPrice');
        $productId = $this->getRequest()->getGet('id');
        
        foreach($groupData['exist'] as $groupId => $price) {
            $query = "SELECT * 
                        FROM `product_group_price`
                        WHERE `productId` = '{$productId}'
                            AND `customerGroupId` = '{$groupId}';
                    ";
            //print_r($query);         
            $groupPrice = \Mage::getModel('Model\Product\Group\Price');        
            $groupPrice->fetchRow($query);
            
            $groupPrice->price = $price;
            $groupPrice->save();
        }

        foreach ($groupData['new'] as $groupId => $price) {
            $groupPrice = \Mage::getModel('Model\Product\Group\Price');
            $groupPrice->customerGroupId = $groupId;
            $groupPrice->productId = $productId;
            $groupPrice->price = $price;
            $groupPrice->save();
        }
        
        $this->redirect('index');
    }

}
?>