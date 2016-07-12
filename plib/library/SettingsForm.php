<?php
// Copyright 1999-2016. Parallels IP Holdings GmbH. All Rights Reserved.

class Modules_BackupHook_SettingsForm extends pm_Form_Simple
{
    protected $_autoInitContext = true;
    protected $_returnUrl;

    public function init()
    {
        parent::init();

        $backupForm = new pm_Form_SubForm();
        $backupForm->setLegend($this->lmsg('components.forms.settings.includeSection'));

        $backupForm->addElement('text', 'include1', [
            'label' => $this->lmsg('components.forms.settings.include1'),
            'value' => pm_Settings::get('include1'),
        ]);
        $backupForm->addElement('text', 'include2', [
            'label' => $this->lmsg('components.forms.settings.include2'),
            'value' => pm_Settings::get('include2'),
        ]);

        $this->addSubForm($backupForm, 'include');

        $backupForm = new pm_Form_SubForm();
        $backupForm->setLegend($this->lmsg('components.forms.settings.excludeSection'));

        $backupForm->addElement('text', 'exclude1', [
            'label' => $this->lmsg('components.forms.settings.exclude1'),
            'value' => pm_Settings::get('exclude1'),
        ]);
        $backupForm->addElement('text', 'exclude2', [
            'label' => $this->lmsg('components.forms.settings.exclude2'),
            'value' => pm_Settings::get('exclude2'),
        ]);

        $this->addSubForm($backupForm, 'exclude');

        $this->addControlButtons([
            'cancelLink' => $this->_returnUrl,
            'hideLegend' => true,
        ]);
    }

    public function process()
    {
        parent::process();
        pm_Settings::set('include1', $this->getSubForm('include')->getValue('include1'));
        pm_Settings::set('include2', $this->getSubForm('include')->getValue('include2'));
        pm_Settings::set('exclude1', $this->getSubForm('exclude')->getValue('exclude1'));
        pm_Settings::set('exclude2', $this->getSubForm('exclude')->getValue('exclude2'));
    }
}
