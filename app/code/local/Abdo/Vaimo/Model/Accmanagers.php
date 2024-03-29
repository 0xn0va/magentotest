<?php
class Abdo_Vaimo_Model_Accmanagers extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('abdo_vaimo/accmanagers');
    }

    protected function _beforeSave()
    {
        parent::_beforeSave();
        $this->_updateTimestamps();
        $this->_prepareUrlKey();
        
        return $this;
    }
    
    protected function _updateTimestamps()
    {
        $timestamp = now();
        $this->setUpdatedAt($timestamp);

        if ($this->isObjectNew()) {
            $this->setCreatedAt($timestamp);
        }
        
        return $this;
    }
    
    protected function _prepareUrlKey()
    {
        return $this;
    }
}