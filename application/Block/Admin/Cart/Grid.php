<?php 
namespace Block\Admin\Cart;

class Grid extends \Block\Core\Template
{
    protected $cart = null;
    protected $cartBillingAddress = null;
    protected $cartShippingAddress = null;

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

    public function getCustomers()
    {
        return \Mage::getModel('Model\Customer')->fetchAll();
    }

    public function getCustomerBillingAddress()
    {
        
        $cartBillingAddress = $this->getCart()->getBillingAddress();
        if ($cartBillingAddress) {
            $this->cartBillingAddress = $cartBillingAddress;
            return $cartBillingAddress;
        }

        $cartBillingAddress = \Mage::getModel('Model\Cart\Address');
        $customer = $this->getCart()->getCustomer();
        if ($customer) {
            $address = $customer->getCustomerBillingAddress();
            if ($address) {
                $cartBillingAddress->zipcode = $address->zipcode;
                $cartBillingAddress->country = $address->country;
                $cartBillingAddress->state = $address->state;
                $cartBillingAddress->address = $address->address;
                $cartBillingAddress->city = $address->city;
                $cartBillingAddress->addressType = $address->addressType;
                $cartBillingAddress->cartId = $this->getCart()->cartId;
                // echo "<pre>";
                // print_r($cartBillingAddress);die;
                $cartBillingAddress->save();
                return $cartBillingAddress;
            } else {
                return $cartBillingAddress;
            }
        } else {
            return $cartBillingAddress;
        }
    
    }

    public function getCustomerShippingAddress()
    {
        $cartShippingAddress = $this->getCart()->getShippingAddress();
        if ($cartShippingAddress) {
            $this->cartShippingAddress = $cartShippingAddress;
            //echo "<pre>";
            //print_r($cartShippingAddress);die;
            return $cartShippingAddress;
        }

        $cartShippingAddress = \Mage::getModel('Model\Cart\Address');

        $customer = $this->getCart()->getCustomer();
        if ($customer) {
            $address = $customer->getCustomerShippingAddress();
            // echo "<pre>";
            // print_r($address); die;
            if ($address) {
                $cartShippingAddress->zipcode = $address->zipcode;
                $cartShippingAddress->country = $address->country;
                $cartShippingAddress->state = $address->state;
                $cartShippingAddress->address = $address->address;
                $cartShippingAddress->city = $address->city;
                $cartShippingAddress->addressType = $address->addressType;
                $cartShippingAddress->cartId = $this->getCart()->cartId;
                $cartShippingAddress->save();
                return $cartShippingAddress;
            } else {
                return $cartShippingAddress;
            }
        } else {
            return $cartShippingAddress;
        }
    
    }


}