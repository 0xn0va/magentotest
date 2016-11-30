<?php
class Abdo_Vaimo_Adminhtml_AccmanagersController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $accmanagersBlock = $this->getLayout()
            ->createBlock('abdo_vaimo_adminhtml/accmanagers');

        $this->loadLayout()
            ->_addContent($accmanagersBlock)
            ->renderLayout();
    }

    public function editAction()
    {
        $accmanagers = Mage::getModel('abdo_vaimo/accmanagers');
        if ($accmanagersId = $this->getRequest()->getParam('id', false)) {
            $accmanagers->load($accmanagersId);

            if ($accmanagers->getId() < 1) {
                $this->_getSession()->addError(
                    $this->__('This account manager no longer exists.')
                );
                return $this->_redirect(
                    'abdo_vaimo_admin/accmanagers/index'
                );
            }
        }
        
        if ($postData = $this->getRequest()->getPost('accmanagersData')) {
            try {
                $accmanagers->addData($postData);
                $accmanagers->save();
                
                $this->_getSession()->addSuccess(
                    $this->__('The account manager has been saved.')
                );
                
                return $this->_redirect(
                    'abdo_vaimo_admin/accmanagers/edit',
                    array('id' => $accmanagers->getId())
                );
            } catch (Exception $e) {
                Mage::logException($e);
                $this->_getSession()->addError($e->getMessage());
            }

        }
        
        Mage::register('current_accmanagers', $accmanagers);
        
        $accmanagersEditBlock = $this->getLayout()->createBlock(
            'abdo_vaimo_adminhtml/accmanagers_edit'
        );
        
        $this->loadLayout()
            ->_addContent($accmanagersEditBlock)
            ->renderLayout();
    }
    
    public function deleteAction()
    {
        $accmanagers = Mage::getModel('abdo_vaimo/accmanagers');

        if ($accmanagersId = $this->getRequest()->getParam('id', false)) {
            $accmanagers->load($accmanagersId);
        }
        
        if ($accmanagers->getId() < 1) {
            $this->_getSession()->addError(
                $this->__('This account manager no longer exists.')
            );
            return $this->_redirect(
                'abdo_vaimo_admin/accmanagers/index'
            );
        }
        
        try {
            $accmanagers->delete();
            
            $this->_getSession()->addSuccess(
                $this->__('The account manager has been deleted.')
            );
        } catch (Exception $e) {
            Mage::logException($e);
            $this->_getSession()->addError($e->getMessage());
        }

        return $this->_redirect(
            'abdo_vaimo_admin/accmanagers/index'
        );
    }

    protected function _isAllowed()
    {

        $actionName = $this->getRequest()->getActionName();
        switch ($actionName) {
            case 'index':
            case 'edit':
            case 'delete':
            default:
                $adminSession = Mage::getSingleton('admin/session');
                $isAllowed = $adminSession
                    ->isAllowed('abdo_vaimo/accmanagers');
                break;
        }
        
        return $isAllowed;
    }
}