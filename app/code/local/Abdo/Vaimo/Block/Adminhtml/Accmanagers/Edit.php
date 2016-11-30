<?php
class Abdo_Vaimo_Block_Adminhtml_Accmanagers_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    protected function _construct()
    {
        $this->_blockGroup = 'abdo_vaimo_adminhtml';
        $this->_controller = 'accmanagers';

        $this->_mode = 'edit';
        
        $newOrEdit = $this->getRequest()->getParam('id')
            ? $this->__('Edit') 
            : $this->__('New');
        $this->_headerText =  $newOrEdit . ' ' . $this->__('Accmanagers');
    }
}