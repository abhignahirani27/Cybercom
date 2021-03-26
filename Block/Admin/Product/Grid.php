<?php
namespace Block\Admin\Product;
\Mage::loadFileByClassName('Block\Core\Grid');
\Mage::loadFileByClassName('Model\Product');

class Grid extends \Block\Core\Grid{

    public function getTitle()
    {
        return  'Product Records';
    }
    
    public function prepareCollection()
    {
        $product = \Mage::getModel('Model\Product');
        $collection = $product->fetchAll();
        $this->setCollection($collection);
        return $this;
    }

    public function prepareColumns()
    {
        $this->addColumn('productId',[
            'field' => 'productId',
            'label' => 'Product Id',
            'type' => 'number'
        ]);

        $this->addColumn('sku',[
            'field' => 'sku',
            'label' => 'SKU',
            'type' => 'varchar'
        ]);

        $this->addColumn('name',[
            'field' => 'name',
            'label' => 'Name',
            'type' => 'text'
        ]);

        $this->addColumn('price',[
            'field' => 'price',
            'label' => 'Price',
            'type' => 'decimal'
        ]);

        $this->addColumn('discount',[
            'field' => 'discount',
            'label' => 'Discount',
            'type' => 'int'
        ]);

        $this->addColumn('quantity',[
            'field' => 'quantity',
            'label' => 'Quantity',
            'type' => 'int'
        ]);
        $this->addColumn('status',[
            'field' => 'status',
            'label' => 'Status',
            'type' => 'varchar'
        ]);

        $this->addColumn('createdDate',[
            'field' => 'createdDate',
            'label' => 'CreatedDate',
            'type' => 'datetime'
        ]);

        $this->addColumn('updatedDate',[
            'field' => 'updatedDate',
            'label' => 'UpdatedDate',
            'type' => 'datetime'
        ]);
    }

    public function prepareActions()
    {
        $this->addAction('update',[
            'label' => 'Update',
            'method' => 'getUpdateUrl',
            'ajax' => false
        ]);

        $this->addAction('delete',[
            'label' => 'Delete',
            'method' => 'getDeleteUrl',
            'ajax' => false
        ]);

        $this->addAction('addtocart',[
            'label' => 'Add To Cart',
            'method' => 'addToCartUrl',
            'ajax' => false
        ]);
        
    }

    public function prepareButtons()
    {
        $this->addButton('addnew',[
            'label' => 'Add New',
            'method' => 'addNewUrl',
            'ajax' => false
        ]);

        $this->addButton('addfilter',[
            'label' => 'Add Filter',
            'method' => 'addFilterUrl',
            'ajax' => false
        ]);
    }

    public function getUpdateUrl($row)
    {
        return $this->getUrl('productUpdate',null,['id' => $row->productId]);
    }

    public function getDeleteUrl($row)
    {
        return $this->getUrl('productdelete',null,['id' => $row->productId]);
    }

    public function addNewUrl()
    {
        return $this->getUrl('productUpdate');
    }

    public function addFilterUrl()
    {
        return $this->getUrl('filter');
    }

    public function addToCartUrl($row)
    {
        return $this->getUrl('addToCart','admin\cart',['id' => $row->productId]);
    }
}
