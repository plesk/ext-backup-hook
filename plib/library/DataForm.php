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

        $data1 = file_exists($this->_path . 'data1') ? file_get_contents($this->_path . 'data1') : '';
        $this->addElement('textarea', 'data1', [
            'label' => $this->lmsg('components.forms.data.data1'),
            'rows' => 8,
            'value' => $data1,
        ]);

        $data2 = file_exists($this->_path . 'data2') ? file_get_contents($this->_path . 'data2') : '';
        $this->addElement('textarea', 'data2', [
            'label' => $this->lmsg('components.forms.data.data2'),
            'rows' => 8,
            'value' => $data2,
        ]);

        $this->addControlButtons([
            'cancelLink' => $this->_returnUrl,
            'hideLegend' => true,
        ]);
    }

    public function process()
    {
        parent::process();
        @mkdir($this->_path, 0777, true);
        @file_put_contents($this->_path . 'data1', $this->getValue('data1'));
        @file_put_contents($this->_path . 'data2', $this->getValue('data2'));
    }
}
