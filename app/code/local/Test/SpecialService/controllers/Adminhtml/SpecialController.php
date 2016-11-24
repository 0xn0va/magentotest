<?php

class Test_SpecialService_Adminhtml_SpecialController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
//        $this->loadLayout()
//            ->_setActiveMenu('specialservicetab')
//            ->_title($this->__('UK'));
//
//        // my stuff
//
//        $this->renderLayout();


        $this->loadLayout();

        $block = $this->getLayout()->createBlock(
            'Mage_Core_Block_Template',
            'my_block_name_here',
            array('template' => 'testspecial/test_specialservice_core_block.phtml')
        );

        //$this->_addContent($block);

        $this->_addLeft($this->getLayout()->createBlock('Test_SpecialServiceBlock_ShowTabsAdminBlock'));

        $this->renderLayout();
    }

}