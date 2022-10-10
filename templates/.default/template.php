<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

$this->setFrameMode(true);
?>
<div class="container">
    <div class="row">
        <div class="col" id="water-drainage-calculator">
            <div class="step-1">
                <form name="water-drainage-calculator-step-1" id="water-drainage-calculator-step-1">
                    <?php
                    require_once __DIR__ . '/step-1-template.php'; ?>
                </form>
            </div>
            <div class="step-2">
                <form name="water-drainage-calculator-step-2" id="water-drainage-calculator-step-2">
                    <?php
                    require_once __DIR__ . '/step-2-template.php'; ?>
                </form>
            </div>
            <div class="step-3">
                <form name="water-supply-calculator-step-3" id="water-supply-calculator-step-3">
                    <?php
                    require_once __DIR__ . '/step-3-template.php'; ?>
                </form>
            </div>
        </div>
    </div>
</div>
