<?php

class Test_SpecialService_Adminhtml_SpecialController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout()
            ->_setActiveMenu('specialservicetab')
            ->_title($this->__('UK'));

        // my stuff

        $this->renderLayout();
    }

}