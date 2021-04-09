<?php
namespace Block\Admin\Config\Edit\Tabs;

class Config extends \Block\Core\Edit
{
    protected $config_group = [];
    protected $configs = [];

    public function __construct()
    {   
        parent::__construct();
       $this->setTemplate('./View/admin/config/edit/tabs/config.php'); 
    }
    
    public function setConfig_group($config_group = null) 
    {
        if ($config_group){
            $this->config_group = $config_group;
            return $this;
        }
        $config_group = \Mage::getModel('Model\Config\Group');
        if ($id = $this->getRequest()->getGet('id')){   
            $config_group = $config_group->load($id);
        }
        $this->config_group = $config_group;
        return $this;
    }

    public function getConfig_group() 
    {
        if (!$this->config_group) {
            $this->setConfig_group();
        }
        return $this->config_group;
    }

    // public function setConfigs($configs = null){
    //     if ($configs) {
    //         $this->$configs = $configs;
    //         return $this;
    //     }
    //     if($groupId = $this->getTableRow()->groupId){
    //         $config = \Mage::getModel('Model\Config\Group\Config');
    //         $query = "SELECT * FROM {$config->getTableName()} WHERE `groupId` = {$groupId};";
    //         $configs = $config->fetchAll($query);
    //         if($configs){
    //             $this->configs = $configs;
    //             return $this;
    //         }
    //     }
    //     $this->configs = $configs;
    //     return $this;
    // }

    // public function getConfigs(){
    //     if (!$this->configs) {
    //         $this->setConfigs();
    //     }
    //     return $this->configs;
    // }
}

?>