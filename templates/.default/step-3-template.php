<?php

use Bitrix\Main\Localization\Loc;

?>
<div class="mt-2 mb-5">
    <div class="timeline-wrapper timeline-wrapper-step-3">
        <div class="line-left"></div>
        <div class="line-right"></div>
        <div style="clear:both;"></div>
        <div class="step-container">
            <div class="timeline-step-1">
                <img class="radio-image" src="<?= $templateFolder; ?>/images/radio-checked.svg" alt="radio-checked" /><br/>
                <div class="step-number"><?= Loc::getMessage('CP_WSC_STEP_1_NUMBER'); ?></div>
                <div class="step-name"><?= Loc::getMessage('CP_WSC_STEP_1_CAPTION'); ?></div>
            </div>
            <div class="timeline-step-2">
                <img class="radio-image" src="<?= $templateFolder; ?>/images/radio-checked.svg" alt="radio-checked" /><br/>
                <div class="step-number"><?= Loc::getMessage('CP_WSC_STEP_2_NUMBER'); ?></div>
                <div class="step-name"><?= Loc::getMessage('CP_WSC_STEP_2_CAPTION'); ?></div>
            </div>
            <div class="timeline-step-3">
                <img class="radio-image" src="<?= $templateFolder; ?>/images/radio-active.svg" alt="radio-active.svg" /><br/>
                <div class="step-number"><?= Loc::getMessage('CP_WSC_STEP_3_NUMBER'); ?></div>
                <div class="step-name"><?= Loc::getMessage('CP_WSC_STEP_3_CAPTION'); ?></div>
            </div>
        </div>
    </div>
</div>
<div class="calculation-result-tables">
    <p class="step-header"><?= Loc::getMessage('CP_WSC_STEP_3_HEADER_OPEN_TYPE'); ?></p>
    <div class="open-type">
        <div class="table-wrapper">
            <table class="calc-result">
                <tr>
                    <td>
                        <div class="name"><?= Loc::getMessage('CP_WSC_TABLE_TYPE_OBJECTS'); ?></div>
                    </td>
                    <td>
                        <div class="name"><?= Loc::getMessage('CP_WSC_TABLE_TYPE_TARIFF'); ?></div>
                        <div class="value water_supply_tariff"></div>
                    </td>
                    <td>
                        <div class="name"><?= Loc::getMessage('CP_WSC_TABLE_TYPE_OBJECTS_VALUE'); ?></div>
                        <div class="value water_supply_volume"></div>
                    </td>
                    <td>
                        <div class="name"><?= Loc::getMessage('CP_WSC_TABLE_PRICE_NO_VAT'); ?></div>
                        <div class="value water_supply_price_no_vat"></div>
                    </td>
                    <td>
                        <div class="name"><?= Loc::getMessage('CP_WSC_TABLE_PRICE_WITH_VAT'); ?></div>
                        <div class="value water_supply_price_with_vat"></div>
                    </td>
                </tr>
                <tr class="second">
                    <td>
                        <div class="name"><?= Loc::getMessage('CP_WSC_TABLE_TYPE_NETWORKS'); ?></div>
                    </td>
                    <td>
                        <div class="name"><?= Loc::getMessage('CP_WSC_TABLE_TYPE_TARIFF'); ?></div>
                        <div class="value water_supply_tariff"></div>
                    </td>
                    <td>
                        <div class="name"><?= Loc::getMessage('CP_WSC_TABLE_TYPE_NETWORKS_VALUE'); ?></div>
                        <div class="value plumbing_length"></div>
                    </td>
                    <td>
                        <div class="name"><?= Loc::getMessage('CP_WSC_TABLE_PRICE_NO_VAT'); ?></div>
                        <div class="value open_plumbing_price_no_vat"></div>
                    </td>
                    <td>
                        <div class="name"><?= Loc::getMessage('CP_WSC_TABLE_PRICE_WITH_VAT'); ?></div>
                        <div class="value open_plumbing_price_with_vat"></div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="total">
            <div class="name"><?= Loc::getMessage('CP_WSC_TABLE_TOTAL'); ?></div>
            <div class="value">
                <span class="item open_total_no_vat"></span>
                <span class="item open_total_with_vat"></span>
            </div>
        </div>
    </div>
    <p class="step-header mt-5"><?= Loc::getMessage('CP_WSC_STEP_3_HEADER_CLOSED_TYPE'); ?></p>
    <div class="closed-type">
        <div class="table-wrapper">
            <table class="calc-result">
                <tr>
                    <td>
                        <div class="name"><?= Loc::getMessage('CP_WSC_TABLE_TYPE_OBJECTS'); ?></div>
                    </td>
                    <td>
                        <div class="name"><?= Loc::getMessage('CP_WSC_TABLE_TYPE_TARIFF'); ?></div>
                        <div class="value water_supply_tariff"></div>
                    </td>
                    <td>
                        <div class="name"><?= Loc::getMessage('CP_WSC_TABLE_TYPE_OBJECTS_VALUE'); ?></div>
                        <div class="value water_supply_volume"></div>
                    </td>
                    <td>
                        <div class="name"><?= Loc::getMessage('CP_WSC_TABLE_PRICE_NO_VAT'); ?></div>
                        <div class="value water_supply_price_no_vat"></div>
                    </td>
                    <td>
                        <div class="name"><?= Loc::getMessage('CP_WSC_TABLE_PRICE_WITH_VAT'); ?></div>
                        <div class="value water_supply_price_with_vat"></div>
                    </td>
                </tr>
                <tr class="second">
                    <td>
                        <div class="name"><?= Loc::getMessage('CP_WSC_TABLE_TYPE_NETWORKS'); ?></div>
                    </td>
                    <td>
                        <div class="name"><?= Loc::getMessage('CP_WSC_TABLE_TYPE_TARIFF'); ?></div>
                        <div class="value water_supply_tariff"></div>
                    </td>
                    <td>
                        <div class="name"><?= Loc::getMessage('CP_WSC_TABLE_TYPE_NETWORKS_VALUE'); ?></div>
                        <div class="value plumbing_length"></div>
                    </td>
                    <td>
                        <div class="name"><?= Loc::getMessage('CP_WSC_TABLE_PRICE_NO_VAT'); ?></div>
                        <div class="value close_plumbing_price_no_vat"></div>
                    </td>
                    <td>
                        <div class="name"><?= Loc::getMessage('CP_WSC_TABLE_PRICE_WITH_VAT'); ?></div>
                        <div class="value close_plumbing_price_with_vat"></div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="total">
            <div class="name"><?= Loc::getMessage('CP_WSC_TABLE_TOTAL'); ?></div>
            <div class="value">
                <span class="item close_total_no_vat"></span>
                <span class="item close_total_with_vat"></span>
            </div>
        </div>
    </div>
    <? $APPLICATION->IncludeComponent(
        "vodokanal:attention",
        ".default",
        array(
            "COMPONENT_TEMPLATE" => ".default",
            "TEXT" => Loc::getMessage("CP_WSC_STEP_3_INFO_TEXT"),
            "HEADER" => Loc::getMessage("CP_WSC_STEP_3_INFO_HEADER"),
            "TYPE" => "info",
            "CLOSABLE" => "N",
            "ADDITIONAL_CLASSES" => "mt-5"
        ),
        false
    ); ?>
</div>

<? $APPLICATION->IncludeComponent(
    "vodokanal:attention",
    ".default",
    array(
        "COMPONENT_TEMPLATE" => ".default",
        "TEXT" => Loc::getMessage("CP_WSC_STEP_3_WARNING_TEXT", array("#THRESHOLD#" => $arParams["WATER_SUPPLY_THRESHOLD"])),
        "HEADER" => Loc::getMessage("CP_WSC_STEP_3_WARNING_HEADER"),
        "TYPE" => "warning",
        "CLOSABLE" => "Y",
        "ADDITIONAL_CLASSES" => "mt-5 calculation-result-alert"
    ),
    false
); ?>
<div class="after-calc-links mt-5 mb-5 text-end">
    <a href="<?= $arParams['PERSONAL_AREA_LINK']; ?>" class="personal-area">
        <img src="<?= $templateFolder; ?>/images/personal-area.png" alt="personal area"/>
        <?= Loc::getMessage('CP_WSC_TABLE_PERSONAL_AREA'); ?>
    </a>
    <a href="#" class="send-to-email">
        <img src="<?= $templateFolder; ?>/images/email.png" alt="personal area"/>
        <?= Loc::getMessage('CP_WSC_TABLE_SEND_EMAIL'); ?>
    </a>
</div>
<div class="email-result-send mb-5">
    <? $APPLICATION->IncludeComponent(
        "vodokanal:button",
        ".default",
        array(
            "IS_NEW_TAB" => "N",
            "LINK" => "#",
            "POSITION" => "center",
            "TEXT" => "Отправить",
            "COMPONENT_TEMPLATE" => ".default",
            "ADDITIONAL_STYLES" => "send-email-button"
        ),
        false
    ); ?>
    <div class="email-wrapper">
        <label for="email" class="form-label mt-4"><?= Loc::getMessage('CP_WSC_EMAIL_LABEL'); ?></label>
        <div class="input-group mb-3">
            <input type="text" class="form-control form-control-lg shadow-none" name="email"
                   id="email" placeholder="<?= Loc::getMessage('CP_WSC_EMAIL_LABEL_PLACEHOLDER'); ?>"
                   aria-label="<?= Loc::getMessage('CP_WSC_EMAIL_LABEL'); ?>">
        </div>
        <div class="errors"></div>
    </div>
    <div style="clear:both"></div>
    <div class="alert alert-success email-send-alert mt-3" role="alert">
        <?= Loc::getMessage('CP_WSC_EMAIL_SEND_SUCCESS'); ?>
    </div>
    <div class="alert alert-warning email-send-alert mt-3" role="alert">
        <?= Loc::getMessage('CP_WSC_EMAIL_SEND_ERROR'); ?>
    </div>
</div>