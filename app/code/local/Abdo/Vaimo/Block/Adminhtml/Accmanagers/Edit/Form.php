<?php
class Abdo_Vaimo_Block_Adminhtml_Accmanagers_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form(array(
            'id' => 'edit_form',
            'action' => $this->getUrl(
                'abdo_vaimo_admin/accmanagers/edit',
                array(
                    '_current' => true,
                    'continue' => 0,
                )
            ),
            'method' => 'post',
        ));
        $form->setUseContainer(true);
        $this->setForm($form);
        $fieldset = $form->addFieldset(
            'general',
            array(
                'legend' => $this->__('Account Manager Details')
            )
        );

        $this->_addFieldsToFieldset($fieldset, array(
            'name' => array(
                'label' => $this->__('Name'),
                'input' => 'text',
                'required' => true,
            ),
            'postal_sector' => array(
                'label' => $this->__('Postal Sector'),
                'input' => 'text',
                'required' => true,
            ),
            'description' => array(
                'label' => $this->__('Description'),
                'input' => 'textarea',
                'required' => true,
            ),


        ));

        return $this;
    }

    protected function _addFieldsToFieldset(
        Varien_Data_Form_Element_Fieldset $fieldset, $fields)
    {
        $requestData = new Varien_Object($this->getRequest()
            ->getPost('accmanagersData'));
        
        foreach ($fields as $name => $_data) {
            if ($requestValue = $requestData->getData($name)) {
                $_data['value'] = $requestValue;
            }
            
            $_data['name'] = "accmanagersData[$name]";
            
            $_data['title'] = $_data['label'];
            
            if (!array_key_exists('value', $_data)) {
                $_data['value'] = $this->_getAccmanagers()->getData($name);
            }
            
            $fieldset->addField($name, $_data['input'], $_data);
        }
        
        return $this;
    }

    protected function _getAccmanagers()
    {
        if (!$this->hasData('accmanagers')) {
            $accmanagers = Mage::registry('current_accmanagers');
            
            if (!$accmanagers instanceof
                Abdo_Vaimo_Model_Accmanagers) {
                $accmanagers = Mage::getModel(
                    'abdo_vaimo/accmanagers'
                );
            }
            
            $this->setData('accmanagers', $accmanagers);
        }
        
        return $this->getData('accmanagers');
    }
}