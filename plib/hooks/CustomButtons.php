<?php
// Copyright 1999-2016. Parallels IP Holdings GmbH. All Rights Reserved.

class Modules_BackupHook_CustomButtons extends pm_Hook_CustomButtons
{
    public function getButtons()
    {
        $buttons = [
            [
                'place' => self::PLACE_DOMAIN_PROPERTIES,
                'title' => pm_Locale::lmsg('backupDataButton'),
                'link' => pm_Context::getActionUrl('domain', 'index'),
                'contextParams' => true,
                'visibility' => function ($options) {
                    if (!isset($options['site_id']) || isset($options['alias_id'])) {
                        return false;
                    }
                    return true;
                }
            ],
            [
                'place' => self::PLACE_CUSTOMER_HOME,
                'title' => pm_Locale::lmsg('backupDataButton'),
                'link' => pm_Context::getActionUrl('client', 'customer'),
            ],
            [
                'place' => self::PLACE_RESELLER_HOME,
                'title' => pm_Locale::lmsg('backupDataButton'),
                'link' => pm_Context::getActionUrl('client', 'reseller'),
            ],
        ];

        if (version_compare(pm_ProductInfo::getVersion(), "17.8.2", ">=")) {
            $buttons = array_merge($buttons, [
                [
                    'place' => [self::PLACE_DOMAIN],
                    'title' => pm_Locale::lmsg('selectiveBackupCreateButton'),
                    'link' => pm_Context::getActionUrl('domain', 'selective-create'),
                    'contextParams' => true,
                ],
                [
                    'place' => [self::PLACE_DOMAIN],
                    'title' => pm_Locale::lmsg('selectiveBackupListButton'),
                    'link' => pm_Context::getActionUrl('domain', 'selective-list'),
                    'contextParams' => true,
                ]

            ]);
        }
        return $buttons;
    }
}
