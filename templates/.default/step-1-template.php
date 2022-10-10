<?php

use Bitrix\Main\Localization\Loc;

?>
<div class="mt-2 mb-5">
    <div class="timeline-wrapper timeline-wrapper-step-1">
        <div class="line-left"></div>
        <div class="line-right"></div>
        <div style="clear:both;"></div>
        <div class="step-container">
            <div class="timeline-step-1">
                <img class="radio-image" src="<?= $templateFolder; ?>/images/radio-active.svg" alt="radio-active" /><br/>
                <div class="step-number"><?= Loc::getMessage('CP_WSC_STEP_1_NUMBER'); ?></div>
                <div class="step-name"><?= Loc::getMessage('CP_WSC_STEP_1_CAPTION'); ?></div>
            </div>
            <div class="timeline-step-2">
                <img class="radio-image" src="<?= $templateFolder; ?>/images/radio-empty.svg" alt="radio-empty" /><br/>
                <div class="step-number"><?= Loc::getMessage('CP_WSC_STEP_2_NUMBER'); ?></div>
                <div class="step-name"><?= Loc::getMessage('CP_WSC_STEP_2_CAPTION'); ?></div>
            </div>
            <div class="timeline-step-3">
                <img class="radio-image" src="<?= $templateFolder; ?>/images/radio-empty.svg" alt="radio-empty.svg" /><br/>
                <div class="step-number"><?= Loc::getMessage('CP_WSC_STEP_3_NUMBER'); ?></div>
                <div class="step-name"><?= Loc::getMessage('CP_WSC_STEP_3_CAPTION'); ?></div>
            </div>
        </div>
    </div>
</div>
<p class="step-header"><?= Loc::getMessage('CP_WSC_STEP_1_HEADER'); ?></p>
<div class="drinking-water-wrapper">
    <label for="drinking-water"
           class="form-label mt-4"><?= Loc::getMessage('CP_WSC_DRINKING_WATER_LABEL'); ?></label>
    <div class="input-group mb-3">
        <input type="text" class="form-control form-control-lg shadow-none" name="drinking-water"
               id="drinking-water" placeholder="" aria-label="" aria-describedby="drinking-water-addon">
        <span class="input-group-text"
              id="drinking-water-addon"><?= Loc::getMessage('CP_WSC_DRINKING_WATER_UNIT'); ?></span>
    </div>
    <div class="errors"></div>
</div>
<div class="land-area-wrapper">
    <label for="land-area"
           class="form-label mt-4"><?= Loc::getMessage('CP_WSD_LAND_AREA_LABEL'); ?></label>
    <div class="input-group mb-3">
        <input type="text" class="form-control form-control-lg shadow-none" name="land-area"
               id="land-area" placeholder="" aria-label="" aria-describedby="land-area-addon">
        <span class="input-group-text"
              id="land-area-addon"><?= Loc::getMessage('CP_WSD_LAND_AREA_LABEL_UNIT'); ?></span>
    </div>
    <div class="errors"></div>
</div>
<p class="step-header mt-5"><?= Loc::getMessage('CP_WSC_STEP_1_SURFACE_HEADER'); ?></p>
<div class="container no-padding">
    <div class="row">
        <div class="col-sm-6 col-12">
            <div class="asphalt-wrapper">
                <label for="asphalt"
                       class="form-label mt-4"><?= Loc::getMessage('CP_WSD_ASPHALT_LABEL'); ?></label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg shadow-none surface-type" name="asphalt"
                           id="asphalt" placeholder="<?= Loc::getMessage('CP_WSD_SURFACE_PLACEHOLDER'); ?>"
                           aria-label="<?= Loc::getMessage('CP_WSD_SURFACE_PLACEHOLDER'); ?>" aria-describedby="land-area-addon">
                    <span class="input-group-text"
                          id="asphalt-addon"><?= Loc::getMessage('CP_WSD_LAND_AREA_LABEL_UNIT'); ?></span>
                </div>
                <div class="errors"></div>
            </div>
            <div class="soils-wrapper">
                <label for="soils"
                       class="form-label mt-4"><?= Loc::getMessage('CP_WSD_SOILS_LABEL'); ?></label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg shadow-none surface-type" name="soils"
                           id="soils" placeholder="<?= Loc::getMessage('CP_WSD_SURFACE_PLACEHOLDER'); ?>"
                           aria-label="<?= Loc::getMessage('CP_WSD_SURFACE_PLACEHOLDER'); ?>" aria-describedby="soils-addon">
                    <span class="input-group-text"
                          id="soils-addon"><?= Loc::getMessage('CP_WSD_LAND_AREA_LABEL_UNIT'); ?></span>
                </div>
                <div class="errors"></div>
            </div>
        </div>
        <div class="col-sm-6 col-12">
            <div class="pavement-wrapper">
                <label for="pavement"
                       class="form-label mt-4"><?= Loc::getMessage('CP_WSD_PAVEMENT_LABEL'); ?></label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg shadow-none surface-type" name="pavement"
                           id="pavement" placeholder="<?= Loc::getMessage('CP_WSD_SURFACE_PLACEHOLDER'); ?>"
                           aria-label="<?= Loc::getMessage('CP_WSD_SURFACE_PLACEHOLDER'); ?>" aria-describedby="pavement-addon">
                    <span class="input-group-text"
                          id="pavement-addon"><?= Loc::getMessage('CP_WSD_LAND_AREA_LABEL_UNIT'); ?></span>
                </div>
                <div class="errors"></div>
            </div>
            <div class="lawn-wrapper">
                <label for="lawn"
                       class="form-label mt-4"><?= Loc::getMessage('CP_WSD_LAWN_LABEL'); ?></label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg shadow-none surface-type" name="lawn"
                           id="lawn" placeholder="<?= Loc::getMessage('CP_WSD_SURFACE_PLACEHOLDER'); ?>"
                           aria-label="<?= Loc::getMessage('CP_WSD_SURFACE_PLACEHOLDER'); ?>" aria-describedby="lawn-addon">
                    <span class="input-group-text"
                          id="lawn-addon"><?= Loc::getMessage('CP_WSD_LAND_AREA_LABEL_UNIT'); ?></span>
                </div>
                <div class="errors"></div>
            </div>
        </div>
        <div class="col mt-4">
            <div class="line"></div>
            <div class="surface-total mt-2"><?= Loc::getMessage('CP_WSD_SURFACE_TOTAL'); ?></div>
        </div>
    </div>
</div>
<?$APPLICATION->IncludeComponent(
	"vodokanal:attention", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"TEXT" => Loc::getMessage("CP_WSC_STEP_1_WARNING_TEXT",array("#THRESHOLD#"=>$arParams["WATER_SUPPLY_THRESHOLD"])),
		"HEADER" => Loc::getMessage("CP_WSC_STEP_1_WARNING_HEADER"),
		"TYPE" => "warning",
		"CLOSABLE" => "Y",
		"ADDITIONAL_CLASSES" => "mt-5"
	),
	false
);?>
<? $APPLICATION->IncludeComponent(
    "vodokanal:button",
    ".default",
    array(
        "IS_NEW_TAB" => "N",
        "LINK" => "#",
        "POSITION" => "center",
        "TEXT" => "Далее",
        "COMPONENT_TEMPLATE" => ".default",
        "ADDITIONAL_STYLES" => "step-1-next mt-5 mb-5"
    ),
    false
); ?>
