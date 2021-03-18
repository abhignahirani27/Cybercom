<?php

namespace Model;
\Mage::loadFileByClassName("Model\Core\Table");

class Attribute extends Core\Table
{

    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;
    const BACKEND_TYPE_VARCHAR = 'varchar';
    const BACKEND_TYPE_INT =  'int';
    const BACKEND_TYPE_DECIMAL = 'decimal';
    const BACKEND_TYPE_TEXT = 'text';
    const INPUT_TYPE_TEXT = 'textbox';
    const INPUT_TYPE_TEXTAREA = 'textarea';
    const INPUT_TYPE_SELECT = 'select';
    const INPUT_TYPE_CHECKBOX = 'checkbox';
    const INPUT_TYPE_RADIO = 'radio';
    const ENTITY_TYPE_CUSTOMER = 'customer';
    const ENTITY_TYPE_CATEGORY = 'category';
    const ENTITY_TYPE_PRODUCT = 'product';

    public function __construct()
    {
        $this->setTableName("attribute");
        $this->setPrimaryKey("attributeId");
    }

    public function getStatusOption()
    {
        return [
            self::STATUS_ENABLED => "Enabled",
            self::STATUS_DISABLED => "Disabled",
        ];
    }

    public function getBackendTypeOption()
    {
        return [
            self::BACKEND_TYPE_VARCHAR => 'Varchar',
            self::BACKEND_TYPE_INT => 'Int',
            self::BACKEND_TYPE_DECIMAL => 'Decimal',
            self::BACKEND_TYPE_TEXT => 'Text'
        ];
    }

    public function getInputTypeOption()
    {
        return [
            self::INPUT_TYPE_TEXT => 'Text Box',
            self::INPUT_TYPE_TEXTAREA => 'Text Area',
            self::INPUT_TYPE_SELECT => 'Select',
            self::INPUT_TYPE_CHECKBOX => 'Checkbox',
            self::INPUT_TYPE_RADIO => 'Radio'
        ];
    }

    public function getEntityTypeOptions()
    {
        return [
            self::ENTITY_TYPE_PRODUCT => 'Product',
            self::ENTITY_TYPE_CATEGORY => 'Category',
            self::ENTITY_TYPE_CUSTOMER => 'Customer'
        ];
    }

    public function getOptions()
    {
        $this->setTableName('attribute_option');
        if (!$this->attributeId) {
            return false;
        }
        $query = "SELECT * FROM `{$this->getTableName()}`
        WHERE `attributeId` = '{$this->attributeId}'
        ORDER BY `sortOrder` ASC";
        $options = \Mage::getModel('Model\Attribute\Option')->fetchAll($query);
        return $options;
    }
}
