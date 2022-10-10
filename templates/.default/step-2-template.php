<?php

use Bitrix\Main\Localization\Loc;

?>
<script>
    let signedParameters = '<?= $this->getComponent()->getSignedParameters() ?>';
</script>
<div class="mt-2 mb-5">
    <div class="timeline-wrapper timeline-wrapper-step-2">
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
                <img class="radio-image" src="<?= $templateFolder; ?>/images/radio-active.svg" alt="radio-active" /><br/>
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
<p class="step-header"><?= Loc::getMessage('CP_WSC_STEP_2_HEADER'); ?></p>
<p class="step-description"><?= Loc::getMessage('CP_WSC_STEP_2_DESCRIPTION'); ?></p>

<? $APPLICATION->IncludeComponent(
	"vodokanal:video-instruction", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"HEADER" => "Как произвести замер",
		"BUTTON_TEXT" => "Видеоинструкция",
		"VIDEO_LINK" => "/upload/video/file_example_MP4_640_3MG.mp4"
	),
	false
); ?>

<h4 class="step-header mb-4"><?= Loc::getMessage('CP_WSC_STEP_MAP_HEADER'); ?>
    <img src="<?= $templateFolder; ?>/images/ruler.png" class="ruler" alt="ruler"/>
</h4>
<div class="rgis-map-wrapper">
    <div class="map">
        <script type="text/javascript" charset="utf-8" async
                src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A8a56fea959a6adc2c422e9e466e741e9fdf08836416681deb7039ebc43cfe248&amp;width=100%25&amp;height=500&amp;lang=ru_RU&amp;scroll=true"></script>
    </div>
    <div class="distance-wrapper">
        <h4 class="step-header mt-4"><?= Loc::getMessage('CP_WSC_CALCULATED_DISTANCE'); ?></h4>
        <label for="distance"
               class="form-label"><?= Loc::getMessage('CP_WSC_DISTANCE_LABEL'); ?></label>
        <div class="input-group mb-3">
            <input type="text" class="form-control form-control-lg shadow-none" name="distance"
                   id="distance" placeholder="" aria-label="" aria-describedby="distance-addon">
            <span class="input-group-text"
                  id="distance-addon"><?= Loc::getMessage('CP_WSC_DISTANCE_UNIT'); ?></span>
        </div>
        <div class="errors"></div>
    </div>
</div>
<? $APPLICATION->IncludeComponent(
    "vodokanal:button",
    ".default",
    array(
        "IS_NEW_TAB" => "N",
        "LINK" => "#",
        "POSITION" => "center",
        "TEXT" => "Далее",
        "COMPONENT_TEMPLATE" => ".default",
        "ADDITIONAL_STYLES" => "step-2-next mt-5 mb-5"
    ),
    false
); ?>
