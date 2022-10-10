<?php

use Bitrix\Main\Localization\Loc;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

$arComponentParameters = array(
    'GROUPS' => array(
        'WATER_SUPPLY' => array(
            'NAME' => Loc::getMessage('WSC_PARAMETERS_GROUP_WATER_SUPPLY')
        ),
        'DRAINAGE' => array(
            'NAME' => Loc::getMessage('WSD_PARAMETERS_GROUP_DRAINAGE')
        )
    ),
    'PARAMETERS' => array(
        'PERSONAL_AREA_LINK' => array(
            'PARENT' => 'BASE',
            'NAME' => Loc::getMessage('WSC_PARAMETERS_PERSONAL_AREA_LINK'),
            'TYPE' => 'STRING',
            'DEFAULT' => ''
        ),
        'EMAIL_EVENT_NAME' => array(
            'PARENT' => 'BASE',
            'NAME' => Loc::getMessage('WSC_PARAMETERS_EMAIL_EVENT_NAME'),
            'TYPE' => 'STRING',
            'DEFAULT' => 'CALCULATION_RESULT_EMAIL_SEND'
        ),
        'M3_TARIFF' => array(
            'PARENT' => 'WATER_SUPPLY',
            'NAME' => Loc::getMessage('WSC_PARAMETERS_M3_TARIFF'),
            'TYPE' => 'STRING',
            'DEFAULT' => '890'
        ),
        'VAT_VALUE' => array(
            'PARENT' => 'WATER_SUPPLY',
            'NAME' => Loc::getMessage('WSC_PARAMETERS_VAT_VALUE'),
            'TYPE' => 'STRING',
            'DEFAULT' => '20'
        ),
        'WATER_SUPPLY_THRESHOLD' => array(
            'PARENT' => 'WATER_SUPPLY',
            'NAME' => Loc::getMessage('WSC_PARAMETERS_WATER_SUPPLY_THRESHOLD'),
            'TYPE' => 'STRING',
            'DEFAULT' => '250'
        ),
        'OPEN_100_150' => array(
            'PARENT' => 'DRAINAGE',
            'NAME' => Loc::getMessage('WSC_PARAMETERS_OPEN_100_150'),
            'TYPE' => 'STRING',
            'DEFAULT' => '23955.48'
        ),
        'CLOSE_100_150' => array(
            'PARENT' => 'DRAINAGE',
            'NAME' => Loc::getMessage('WSC_PARAMETERS_CLOSE_100_150'),
            'TYPE' => 'STRING',
            'DEFAULT' => '30127.59'
        ),
        'OPEN_150_200' => array(
            'PARENT' => 'DRAINAGE',
            'NAME' => Loc::getMessage('WSC_PARAMETERS_OPEN_150_200'),
            'TYPE' => 'STRING',
            'DEFAULT' => '25805.68'
        ),
        'CLOSE_150_200' => array(
            'PARENT' => 'DRAINAGE',
            'NAME' => Loc::getMessage('WSC_PARAMETERS_CLOSE_150_200'),
            'TYPE' => 'STRING',
            'DEFAULT' => '30887.96'
        ),
        'OPEN_200_250' => array(
            'PARENT' => 'DRAINAGE',
            'NAME' => Loc::getMessage('WSC_PARAMETERS_OPEN_200_250'),
            'TYPE' => 'STRING',
            'DEFAULT' => '26500.71'
        ),
        'CLOSE_200_250' => array(
            'PARENT' => 'DRAINAGE',
            'NAME' => Loc::getMessage('WSC_PARAMETERS_CLOSE_200_250'),
            'TYPE' => 'STRING',
            'DEFAULT' => '32916.46'
        ),
    )
);
