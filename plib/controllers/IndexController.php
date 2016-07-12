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
