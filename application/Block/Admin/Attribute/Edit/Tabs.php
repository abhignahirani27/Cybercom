<?php

namespace Block\Admin\Attribute\Edit;
\Mage::loadFileByClassName('Block\Core\Template');

class Tabs extends \Block\Core\Template
{
    protected $tabs = [];
    protected $defaultTab = null;

    function __construct()
    {
        $this->setTemplate('./View/admin/attribute/edit/tabs.php');
        $this->prepareTabs();
    }

    public function prepareTabs()
    {
        $this->addTab('form', ['key' => 'form', 'label' => 'Attribute Information', 'block' => 'Block\Admin\Attribute\Edit\Tabs\Form']);
        $this->addTab('option', ['key' => 'option', 'label' => 'Option', 'block' => 'Block\Admin\Attribute\Edit\Tabs\Option']);
        $this->setDefaultTab('form');
        return $this;
    }
    public function setDefaultTab($defaultTab)
    {
        $this->defaultTab = $defaultTab;
        return $this;
    }
    public function getDefaultTab()
    {
        return $this->defaultTab;
    }

    public function setTabs(array $tabs = [])
    {
        $this->tabs = $tabs;
        return $this;
    }

    public function getTabs()
    {
        return $this->tabs;
    }

    public function addTab($key, $tab = [])
    {
        $this->tabs[$key] = $tab;
        return $this;
    }

    public function getTab($key)
    {
        if (!array_key_exists($key, $this->tabs)) {
            return null;
        }
        return $this->tabs[$key];
    }

    public function removeTab($key)
    {
        if (array_key_exists($key, $this->tabs)) {
            unset($this->tabs[$key]);
        }
        return $this;
    }
}
