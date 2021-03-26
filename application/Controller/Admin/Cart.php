<?php
namespace Controller\Admin;
date_default_timezone_set("Asia/Calcutta");

class Cart extends \Controller\Core\Admin
{
    public function addToCartAction()
    {

        try {
            $productId = $this->getRequest()->getGet('id');
            $product = \Mage::getModel('Model\Product')->load($productId);
            if(!$product){
                throw new \Exception("Product is not valid");    
            }
            $cart = $this->getCart();
            $cart->addItemToCart($product,1,true);
            $this->getMessage()->setSuccess('Item successfully added into cart');

        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('index');
    }

    protected function getCart()
    {
        $sessionId = \Mage::getModel('Model\Admin\Session')->getId();
        $cart = \Mage::getModel('Model\Cart');
        $query = "SELECT * FROM `{$cart->getTableName()}` WHERE sessionId = '{$sessionId}' ";
        $cart = $cart->fetchRow($query);

        if($cart){
            return $cart; 
        }
        $cart = \Mage::getModel('Model\Cart');
        $cart->sessionId = $sessionId;
        $cart->createdDate = date("Y-m-d H:i:s");
        $cart->save();
        return $cart;

    }

    public function indexAction()
    {
        $grid = \Mage::getBlock('Block\Admin\Cart\Grid');
        $layout = $this->getLayout();
        $content = $layout->getChild('content')->addChild($grid);
        $cart = $this->getCart();
        $grid->setCart($cart);
        $this->toHtmlLayout();
    }

    public function updateAction()
    {
        try {
            $quantities = $this->getRequest()->getPost('quantity');
            $cart = $this->getCart();
        
            foreach ($quantities as $cartItemId => $quantity) {
                $cartItem = \Mage::getModel('Model\Cart\Item')->load($cartItemId);
                $cartItem->quantity = $quantity;
                $cartItem->save();
            }
            $this->getMessage()->setSuccess('Items updated');
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('index');
    }

    public function deleteAction()
    {
        try {
            $id = $this->getRequest()->getGet('id');
                if(!$id){
                    throw new \Exception("Invail Id");    
                }
                $cartItem = \Mage::getModel('Model\Cart\Item');
                $cartItem->load($id);
                if($cartItem->delete()){
                    $this->getMessage()->setSuccess("Deleted Successsfully");
                }
                else{
                $this->getMessage()->setFailure("Unable to delete");
                }

        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('index');
    }
}