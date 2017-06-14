<?php
// Copyright 1999-2016. Parallels IP Holdings GmbH. All Rights Reserved.

class Modules_BackupHook_SelectiveForm extends pm_Form_Simple
{
    protected $_autoInitContext = true;
    protected $_returnUrl;
    protected $_path;
    protected $_domainId;
    protected $_backupContextId;
    protected $_formAction;

    public function init()
    {
        parent::init();

        $this->addElement('textarea', 'marker', [
            'label' => $this->lmsg('components.forms.selective.marker'),
            'rows' => 1,
            'value' => '',
        ]);

        if (stripos($this->_formAction, 'create') !== false) {
            $this->addElement('textarea', 'description', [
                'label' => $this->lmsg('components.forms.selective.description'),
                'rows' => 1,
                'value' => '',
            ]);

            $this->addElement('textarea', 'files', [
                'label' => $this->lmsg('components.forms.selective.files'),
                'rows' => 8,
                'value' => '',
            ]);

            $this->addElement('textarea', 'databases', [
                'label' => $this->lmsg('components.forms.selective.databases'),
                'rows' => 3,
                'value' => '',
            ]);

        }
        $this->addControlButtons([
            'cancelLink' => $this->_returnUrl,
            'hideLegend' => true,
        ]);
    }

    public function process()
    {
        if (stripos($this->_formAction, 'create') !== false) {
            $domain = new pm_Domain($this->_domainId);
            if (!$domain) {
                throw new Exception('Permission denied');
            }

            pm_Settings::set($this->_backupContextId, json_encode([
                'marker' => $this->getValue('marker'),
                'description' => $this->getValue('description'),
                'files' => $this->getValue('files'),
                'databases' => $this->getValue('databases')
            ]));
        }
        parent::process();

    }

}
