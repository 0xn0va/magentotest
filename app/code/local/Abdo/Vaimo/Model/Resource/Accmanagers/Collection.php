<?php
class Abdo_Vaimo_Model_Resource_Accmanagers_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct()
    {
        parent::_construct();

        $this->_init(
            'abdo_vaimo/accmanagers',
            'abdo_vaimo/accmanagers'
        );
    }
}