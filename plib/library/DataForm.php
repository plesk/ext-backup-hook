<?php
// Copyright 1999-2016. Parallels IP Holdings GmbH. All Rights Reserved.

class Modules_BackupHook_DataForm extends pm_Form_Simple
{
    protected $_autoInitContext = true;
    protected $_returnUrl;
    protected $_path;

    public function init()
    {
        parent::init();

        $fm = new pm_ServerFileManager();

        $this->addElement('textarea', 'data1', [
            'label' => $this->lmsg('components.forms.data.data1'),
            'rows' => 8,
            'value' => $fm->fileExists($this->_path . '/data1') ? $fm->fileGetContents($this->_path . '/data1') : '',
        ]);

        $this->addElement('textarea', 'data2', [
            'label' => $this->lmsg('components.forms.data.data2'),
            'rows' => 8,
            'value' => $fm->fileExists($this->_path . '/data2') ? $fm->fileGetContents($this->_path . '/data2') : '',
        ]);

        $this->addControlButtons([
            'cancelLink' => $this->_returnUrl,
            'hideLegend' => true,
        ]);
    }

    public function process()
    {
        parent::process();

        $fm = new pm_ServerFileManager();
        if (!$fm->fileExists($this->_path)) {
            $fm->mkdir($this->_path, '0755', true);
        }
        $fm->filePutContents($this->_path . '/data1', $this->getValue('data1'));
        $fm->filePutContents($this->_path . '/data2', $this->getValue('data2'));
    }
}
