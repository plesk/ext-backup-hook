<?php
// Copyright 1999-2016. Parallels IP Holdings GmbH. All Rights Reserved.

class ClientController extends pm_Controller_Action
{
    public function indexAction()
    {
        $client = pm_Session::getClient();

        $context = [
            'path' => pm_Context::getVarDir() . 'client/' . $client->getProperty('login') . '/',
            'returnUrl' => '/',
        ];

        $this->_helper->form(new Modules_BackupHook_DataForm(['context' => $context]), [
            'returnUrl' => $context['returnUrl'],
        ]);
    }

    public function customerAction()
    {
        $this->forward('index');
    }

    public function resellerAction()
    {
        $this->forward('index');
    }

    public function adminAction()
    {
        $this->forward('index');
    }
}
