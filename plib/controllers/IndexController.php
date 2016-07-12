<?php
// Copyright 1999-2016. Parallels IP Holdings GmbH. All Rights Reserved.

use PleskExt\Ruby\Entity\Application;
use PleskExt\Ruby\Entity\DomainHandler;
use PleskExt\Ruby\Entity\Handler;
use PleskExt\Ruby\EntityManager;

class IndexController extends pm_Controller_Action
{
    protected $_accessLevel = 'admin';

    public function indexAction()
    {
        $this->_redirect('index/overview');
    }

    public function overviewAction()
    {
        $this->view->size = [];
        foreach (['server', 'client', 'domain'] as $type) {
            $this->view->size[$type] = $this->_calculateSize(pm_Context::getVarDir() . $type);
        }

        $this->view->smallTools = [
            [
                'title' => pm_Locale::lmsg('backupDataButton'),
                'class' => 'sb-backup',
                'link' => pm_Context::getActionUrl('index', 'backup-data'),
            ],
            [
                'title' => $this->lmsg('controllers.index.overview.clearButton'),
                'class' => 'sb-delete',
                'link' => 'javascript:Jsw.redirectPost("' . pm_Context::getActionUrl('index', 'clear') . '");',
            ],
        ];
    }

    public function backupDataAction()
    {
        $context = [
            'path' => pm_Context::getVarDir() . 'server/',
            'returnUrl' => pm_Context::getActionUrl('index', 'overview'),
        ];

        $this->_helper->form(new Modules_BackupHook_DataForm(['context' => $context]), [
            'returnUrl' => $context['returnUrl'],
        ]);
    }

    public function clearAction()
    {
        if (!$this->_request->isPost()) {
            throw new pm_Exception('Permission denied');
        }

        $fm = new pm_ServerFileManager();
        foreach (['server', 'client', 'domain'] as $type) {
            $fm->removeDirectory(pm_Context::getVarDir() . $type);
        }

        $this->_status->addMessage('info', $this->lmsg('controllers.index.clear.success'));
        $this->_redirect(pm_Context::getActionUrl('index', 'overview'), ['prependBase' => false]);
    }

    private function _calculateSize($path)
    {
        if (!file_exists($path)) {
            return 0;
        }

        $directory  = new RecursiveDirectoryIterator($path);

        $size = 0;
        foreach (new RecursiveIteratorIterator($directory) as $f => $current) {
            if (!$current->isFile()) {
                continue;
            }
            $size += $current->getSize();
        }

        return $size;
    }
}
