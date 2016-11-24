<?php

class Test_SpecialServiceBlock_ShowTabsAdminBlock extends Mage_Adminhtml_Block_Widget_Tabs
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('my_custom_freely_assigned_id_for_tabs');
        $this->setTitle(Mage::helper('test_specialservicehelper')->__('Custom CoffeeFreak_ShowTabs Block title here'));
    }

    protected function _beforeToHtml()
    {
        $this->addTab('custom_assigned_tab1_id_name', array(
            'label'     => Mage::helper('test_specialservicehelper')->__('Custom tab1 here'),
            'title'     => Mage::helper('test_specialservicehelper')->__('My custom tab1 title here'),
            'content'   => 'Some content here. We could add direct string here, or we can use something like $this->getLayout()->createBlock("adminhtml/cms_page_edit_tab_main")->toHtml()',
            'active'    => true
        ));

        $this->addTab('custom_aka_freely_assigned_tab2_id_name', array(
            'label'     => Mage::helper('test_specialservicehelper')->__('Custom tab2 here'),
            'title'     => Mage::helper('test_specialservicehelper')->__('My custom tab2 title here'),
            'content'   => 'Another content here. As mentioned, we could add direct string here, or we can use something like $this->getLayout()->createBlock("adminhtml/cms_page_edit_tab_main")->toHtml()',
            'active'    => false
        ));


        return parent::_beforeToHtml();
    }
}