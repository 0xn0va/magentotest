<?php
class Abdo_Vaimo_Model_Resource_Accmanagers extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('abdo_vaimo/accmanagers', 'entity_id');
    }
}