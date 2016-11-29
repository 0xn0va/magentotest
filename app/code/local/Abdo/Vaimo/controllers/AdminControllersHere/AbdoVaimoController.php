<?php

class Abdo_Vaimo_AdminControllersHere_AbdoVaimoController extends Mage_Adminhtml_Controller_Action
{
	public function indexAction()
	{
		$this->loadLayout();
		
		$block = $this->getLayout()->createBlock(
			'Mage_Core_Block_Template',
			'my_block_name_here',
			array('template' => 'abdo/example_core_block.phtml')
		);
		
		
		
		
		$this->getLayout()->getBlock('content')->append($block);

		$this->renderLayout();
	}
}