<?php
// Copyright 1999-2016. Parallels IP Holdings GmbH. All Rights Reserved.

class DomainController extends pm_Controller_Action
{
    public function indexAction()
    {
        $domain = $this->_getDomain();

        $context = [
            'path' => pm_Context::getVarDir() . 'site/' . $domain->getName() . '/',
            'returnUrl' => '/smb/web/view',
        ];

        $this->_helper->form(new Modules_BackupHook_DataForm(['context' => $context]), [
            'returnUrl' => $context['returnUrl'],
        ]);
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
