$(document).ready(function () {
    const drinkingWaterStartValue = 0.01,
        drinkingWaterEndValue = 250,
        landAreaStartValue = 1,
        landAreaEndValue = 128768.5,
        allSurfaceStartValue = 0.01,
        distanceStartValue = 0,
        distanceEndValue = 1000,
        componentName = 'vodokanal:water-drainage-calculator';

    let formStep1Selector = $('#water-drainage-calculator-step-1'),
        drinkingWaterSelector = $('#drinking-water'),
        drinkingWaterConstrains = 'от ' + drinkingWaterStartValue + ' - до ' + drinkingWaterEndValue,
        landAreaSelector = $('#land-area'),
        landAreaConstrains = 'от ' + landAreaStartValue + ' - до ' + landAreaEndValue,
        asphaltSelector = $('#asphalt'),
        soilsSelector = $('#soils'),
        pavementSelector = $('#pavement'),
        lawnSelector = $('#lawn'),
        formStep2Selector = $('#water-drainage-calculator-step-2'),
        distanceSelector = $('#distance'),
        distanceConstrains = 'от ' + distanceStartValue + ' - до ' + distanceEndValue,
        formStep3Selector = $('#water-supply-calculator-step-3');

    // Colorize input element on input click
    $('input.form-control').on('click', function () {
        $('input.form-control, label.form-label, span.input-group-text').removeClass('active');
        $(this).addClass('active');
        $('label[for="' + $(this).attr('name') + '"]').addClass('active');
        $('span#' + $(this).attr('name') + '-addon').addClass('active');
    });

    // Add placeholders and area label with constants
    drinkingWaterSelector.attr('placeholder', drinkingWaterConstrains).attr('aria-label', drinkingWaterConstrains);
    landAreaSelector.attr('placeholder', landAreaConstrains).attr('aria-label', landAreaConstrains);
    distanceSelector.attr('placeholder', distanceConstrains).attr('aria-label', distanceConstrains);

    // 3rd step email send
    $('a.send-to-email').on('click', function (e) {
        e.preventDefault();
		let emailSendBlockSelector = $('div.email-result-send');
		if ('flex' === emailSendBlockSelector.css('display')) {
			emailSendBlockSelector.css({'display': 'none'});
		} else {
			emailSendBlockSelector.css({'display': 'flex'});
		}
    });

    // Calculate surfaces area
    $('.surface-type').on('keyup', function () {
        let asphalt = isNaN(parseFloat(asphaltSelector.val())) ? 0 : parseFloat(asphaltSelector.val()),
            soils = isNaN(parseFloat(soilsSelector.val())) ? 0 : parseFloat(soilsSelector.val()),
            pavement = isNaN(parseFloat(pavementSelector.val())) ? 0 : parseFloat(pavementSelector.val()),
            lawn = isNaN(parseFloat(lawnSelector.val())) ? 0 : parseFloat(lawnSelector.val()),
            total = asphalt + soils + pavement + lawn
        $('.surface-total .total').html(total.toFixed(1));
    })

    // Working with steps templates (show/hide) and validation
    // Step 1
    $('a.step-1-next').on('click', function (e) {
        e.preventDefault();

        formStep1Selector.validate(getValidateSettings());
        appendFirstStepRules();
        if (!formStep1Selector.valid()) {
            return;
        }

        $('div.step-1').hide();
        $('div.step-2').show();
        $('html, body').animate({scrollTop: 0}, 'fast');
    });

    // Step 2
    $('a.step-2-next').on('click', function (e) {
        e.preventDefault();

        formStep2Selector.validate(getValidateSettings());
        appendSecondStepRules();
        if (!formStep2Selector.valid()) {
            return;
        }

        performAjaxCalculateCall();
    });

    // Step 3
    $('a.send-email-button').on('click', function (e) {
        e.preventDefault();

        formStep3Selector.validate(getValidateSettings());
        appendThirdStepRules();
        if (!formStep3Selector.valid()) {
            return;
        }

        performAjaxEmailSendCall();
    });

    // Timeline clicks
    // Step 1
    $('div.timeline-step-1').on('click', function () {
        $('div.step-2, div.step-3').hide();
        $('div.step-1').show();
        $('html, body').animate({scrollTop: 0}, 'fast');
    });

    // Step 2
    $('div.timeline-step-2').on('click', function () {
        $('div.step-3').hide();
        $('a.step-1-next').click();
    });

    // Step 3
    $('div.timeline-step-3').on('click', function () {
        if ($('div.step-1').is(":hidden")) {
            $('a.step-2-next').click();
        }
    });

    /**
     * Method returns base settings for form validate
     *
     * @return {{highlight: highlight, unhighlight: unhighlight, errorElement: string, errorPlacement: errorPlacement}}
     */
    function getValidateSettings() {
        return {
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.appendTo(element.parent('div').next('div'));
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass(errorClass).removeClass(validClass);
                $(element).parent().parent().find("label[for=" + element.id + "]").addClass(errorClass);
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).addClass(validClass).removeClass(errorClass);
                $(element).parent().parent().find("label[for=" + element.id + "]").removeClass(errorClass);
            }
        };
    }

    /**
     * Method append rules for first step fields
     */
    function appendFirstStepRules() {
        drinkingWaterSelector.rules('add', {
            required: true,
            min: drinkingWaterStartValue,
            max: drinkingWaterEndValue,
            messages: {
                required: 'Поле обязательно для заполнения',
                min: 'Указанные значения меньше допустимых (' + drinkingWaterConstrains + ')',
                max: 'Указанные значения превышают допустимые (' + drinkingWaterConstrains + ')',
            }
        });
        landAreaSelector.rules('add', {
            required: true,
            min: landAreaStartValue,
            max: landAreaEndValue,
            messages: {
                required: 'Поле обязательно для заполнения',
                min: 'Указанные значения меньше допустимых (' + landAreaConstrains + ')',
                max: 'Указанные значения превышают допустимые (' + landAreaConstrains + ')',
            }
        });
        asphaltSelector.rules('add', {
            min: allSurfaceStartValue,
            messages: {
                min: 'Указанное значение меньше допустимого (' + allSurfaceStartValue + ')',
            }
        });
        soilsSelector.rules('add', {
            min: allSurfaceStartValue,
            messages: {
                min: 'Указанное значение меньше допустимого (' + allSurfaceStartValue + ')',
            }
        });
        pavementSelector.rules('add', {
            min: allSurfaceStartValue,
            messages: {
                min: 'Указанное значение меньше допустимого (' + allSurfaceStartValue + ')',
            }
        });
        lawnSelector.rules('add', {
            min: allSurfaceStartValue,
            messages: {
                min: 'Указанное значение меньше допустимого (' + allSurfaceStartValue + ')',
            }
        });
    }

    /**
     * Method append rules for second step fields
     */
    function appendSecondStepRules() {
        distanceSelector.rules('add', {
            required: true,
            min: distanceStartValue,
            max: distanceEndValue,
            messages: {
                required: 'Поле обязательно для заполнения',
                min: 'Указанные значения меньше допустимых (' + distanceConstrains + ')',
                max: 'Указанные значения превышают допустимые (' + distanceConstrains + ')',
            }
        });
    }

    /**
     * Method perform ajax component call and fill table on 3rd step
     */
    function performAjaxCalculateCall() {
        BX.ajax.runComponentAction(componentName, 'calculate', {
            mode: 'class',
            data: {
                'drinkingWater': drinkingWaterSelector.val(),
                'landArea': landAreaSelector.val(),
                'asphalt': asphaltSelector.val(),
                'soils': soilsSelector.val(),
                'pavement': pavementSelector.val(),
                'lawn': lawnSelector.val(),
                'distance': distanceSelector.val()
            },
            signedParameters: signedParameters
        }).then(function (response) {
            let arResult = JSON.parse(response.data);
            if (arResult.success) {
                // Append data to correspondent fields
                $.each(arResult, function (selector, value) {
                    $('.' + selector).html(value);
                });
                $('div.calculation-result-alert').hide();
                $('div.calculation-result-tables').show();
            } else {
                $('div.calculation-result-tables').hide();
                $('div.calculation-result-alert').show();
                $('.water_supply_volume').html(arResult.water_supply_volume);
            }

            $('div.step-2').hide();
            $('div.step-3').show();
            $('html, body').animate({scrollTop: 0}, 'fast');
        });
    }

    /**
     * Method append rules for second step fields
     */
    function appendThirdStepRules() {
        $('#email').rules('add', {
            required: true,
            email: true,
            messages: {
                required: 'Поле обязательно для заполнения',
                email: 'Укажите правильный адрес электронной почты',
            }
        });
    }

    /**
     * Method performs ajax component call and sends an email
     */
    function performAjaxEmailSendCall() {
        BX.ajax.runComponentAction(componentName, 'send', {
            mode: 'class',
            data: {
                'water_supply_tariff': $('.value.water_supply_tariff').html(),
                'water_supply_volume': $('.value.water_supply_volume').html(),
                'water_supply_price_no_vat': $('.value.water_supply_price_no_vat').html(),
                'water_supply_price_with_vat': $('.value.water_supply_price_with_vat').html(),
                'plumbing_length': $('.value.plumbing_length').html(),
                'open_plumbing_price_no_vat': $('.value.open_plumbing_price_no_vat').html(),
                'open_plumbing_price_with_vat': $('.value.open_plumbing_price_with_vat').html(),
                'close_plumbing_price_no_vat': $('.value.close_plumbing_price_no_vat').html(),
                'close_plumbing_price_with_vat': $('.value.close_plumbing_price_with_vat').html(),
                'open_total_no_vat': $('.item.open_total_no_vat').html(),
                'open_total_with_vat': $('.item.open_total_with_vat').html(),
                'close_total_no_vat': $('.item.close_total_no_vat').html(),
                'close_total_with_vat': $('.item.close_total_with_vat').html(),
                'first_row_name': $('.first-row-name').html(),
                'second_row_name': $('.second-row-name').html()
            },
            signedParameters: signedParameters
        }).then(function (response) {
            let arResult = JSON.parse(response.data);
            $('.email-send-alert').hide();
            if (arResult.success) {
                $('.email-send-alert.alert-success').fadeIn();
            } else {
                $('.email-send-alert.alert-warning').fadeIn();
            }
        });
    }
});