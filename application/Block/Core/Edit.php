<?php 
namespace Block\Core;

\Mage::loadFileByClassName('Block\Core\Template');
\Mage::loadFileByClassName('Block\Core\Edit\EditInterface');

class Edit extends \Block\Core\Template implements \Block\Core\Edit\EditInterface{
    public function getFormUrl()
    {
        return null;
    }
}
?>