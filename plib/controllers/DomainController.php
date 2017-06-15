<?php
// Copyright 1999-2016. Parallels IP Holdings GmbH. All Rights Reserved.

class DomainController extends pm_Controller_Action
{
    public function indexAction()
    {
        $domain = $this->_getDomain();

        $context = [
            'path' => pm_Context::getVarDir() . 'domain/' . $domain->getName(),
            'returnUrl' => '/smb/web/view',
        ];

        $this->_helper->form(new Modules_BackupHook_DataForm(['context' => $context]), [
            'returnUrl' => $context['returnUrl'],
        ]);
    }

    public function selectiveCreateAction()
    {
        $domain = $this->_getDomain();
        $backupContextId = 'backup_context_' . $this->_getParam('dom_id');
        $context = [
            'path' => pm_Context::getVarDir() . 'domain/' . $domain->getName(),
            'returnUrl' => '/smb/web/view',
            'domainId' => $this->_getParam('dom_id'),
            'backupContextId' => $backupContextId,
            'formAction' => 'selective-redirect-create',
        ];

        $this->_helper->form(new Modules_BackupHook_SelectiveForm(
            [
                'context' => $context,
            ]), ['returnUrl' => pm_Backup_Manager::getBackupUrl((int)$this->_getParam('dom_id'), $backupContextId)]);
    }

    public function selectiveListAction()
    {
        $domain = $this->_getDomain();

        $context = [
            'path' => pm_Context::getVarDir() . 'domain/' . $domain->getName(),
            'returnUrl' => '/smb/web/view',
            'domainId' => $this->_getParam('dom_id'),
            'formAction' => 'selective-redirect-list'

        ];

        $this->_helper->form(new Modules_BackupHook_SelectiveForm(
            [
                'context' => $context,
            ]), ['returnUrl' => pm_Backup_Manager::getListUrl((int)$this->_getParam('dom_id'), $this->getParam('marker'))]);
    }

    public function selectiveRedirectListAction()
    {
        $this->redirect(pm_Backup_Manager::getListUrl((int)$this->_getParam('dom_id'), ''));
    }


    private function _getDomain()
    {
        $domainId = (int)$this->_getParam('site_id');
        $domain = $domainId ? new pm_Domain($domainId) : pm_Session::getCurrentDomain();
        if (!$domain) {
            throw new pm_Exception('Permission denied');
        }
        return $domain;
    }

}
