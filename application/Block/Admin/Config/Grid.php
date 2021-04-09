<?php
namespace Block\Admin\Config;

class Grid extends \Block\Core\Template{
    protected $config_groups = [];

    public function __construct()
    {
       $this->setTemplate('./View/admin/config/grid.php'); 
    }

    public function setConfig_groups($config_groups =NULL) {

            if(!$config_groups) {
                $config_groups = \Mage::getModel('Model\Config\Group');
                $config_groups = $config_groups->fetchAll();
            }
            $this->config_groups = $config_groups;
            return $this;
    }       

    public function getConfig_groups() {
        if (!$this->config_groups) {
            $this->setConfig_groups();
        }
        return $this->config_groups;
    }

}