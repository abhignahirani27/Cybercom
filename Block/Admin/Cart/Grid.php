<?php 
namespace Block\Admin\Cart;

class Grid extends \Block\Core\Template
{
    protected $cart = null;
    public function __construct()
    {
       $this->setTemplate('./View/admin/cart/grid.php'); 
    }

    public function setCart(\Model\Cart $cart)
    {
        $this->cart = $cart;
        return $this;
    }

    public function getCart()
    {
        return $this->cart;
    }
}