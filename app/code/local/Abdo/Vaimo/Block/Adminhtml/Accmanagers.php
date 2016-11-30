<?php
class Abdo_Vaimo_Block_Adminhtml_Accmanagers extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    protected function _construct()
    {
        parent::_construct();

        $this->_blockGroup = 'abdo_vaimo_adminhtml';

        $this->_controller = 'accmanagers';

        $this->_headerText = Mage::helper('abdo_vaimo')
            ->__('UK Account Managers List');
    }
    
    public function getCreateUrl()
    {
        return $this->getUrl(
            'abdo_vaimo_admin/accmanagers/edit'
        );
    }
}