<?php
use Bitrix\Main\Localization\Loc;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

$arComponentDescription = array(
    "NAME" => Loc::getMessage("COMP_WD_CALC_NAME"),
    "DESCRIPTION" => Loc::getMessage("COMP_WD_CALC_DESCRIPTION"),
    "PATH" => array(
        "ID" => Loc::getMessage("COMP_VODOKANAL_PATH_ID"),
        "NAME" => Loc::getMessage("COMP_VODOKANAL_PATH_NAME")
    )
);