<?php

use Bitrix\Main\Engine\ActionFilter\Authentication;
use Bitrix\Main\Engine\Contract\Controllerable;
use Bitrix\Main\Mail\Event;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

/**
 * Class WaterDrainageCalculatorComponent
 */
class WaterDrainageCalculatorComponent extends CBitrixComponent implements Controllerable
{
    /** @var float Default constant if surface not set */
    private const DEFAULT_AREA_SUPPLY_CONSTANT = 0.001941469;
    /** @var float Asphalt surface */
    private const AREA_ASPHALT_CONSTANT = 0.001941469;
    /** @var float Soils surface */
    private const AREA_SOILS_CONSTANT = 0.001941469;
    /** @var float Pavement surface */
    private const AREA_PAVEMENT_CONSTANT = 0.001941469;
    /** @var float Lawn surface */
    private const AREA_LAWN_CONSTANT = 0.001941469;

    /** @var array Array with data for 3rd step */
    private $resultArray;

    /**
     * Stub method for actions
     *
     * @return array Just empty array
     */
    public function configureActions(): array
    {
        return [
            'calculate' => [
                '-prefilters' => [
                    Authentication::class,
                ],
            ],
			'send' => [
                '-prefilters' => [
                    Authentication::class,
                ],
            ]
        ];
    }

    /**
     * Method prepares params and sets default values
     *
     * @param $arParams
     *
     * @return array
     */
    public function onPrepareComponentParams($arParams): array
    {
        $arParams['M3_TARIFF'] = $arParams['M3_TARIFF'] ?? '890';
        $arParams['VAT_VALUE'] = $arParams['VAT_VALUE'] ?? '20';
        $arParams['WATER_SUPPLY_THRESHOLD'] = $arParams['WATER_SUPPLY_THRESHOLD'] ?? '250';
        $arParams['EMAIL_EVENT_NAME'] = $arParams['EMAIL_EVENT_NAME'] ?? 'CALCULATION_RESULT_EMAIL_SEND';
        $arParams['OPEN_100_150'] = $arParams['OPEN_100_150'] ?? '23955.48';
        $arParams['CLOSE_100_150'] = $arParams['CLOSE_100_150'] ?? '30127.59';
        $arParams['OPEN_150_200'] = $arParams['OPEN_150_200'] ?? '25805.68';
        $arParams['CLOSE_150_200'] = $arParams['CLOSE_150_200'] ?? '30887.96';
        $arParams['OPEN_200_250'] = $arParams['OPEN_200_250'] ?? '26500.71';
        $arParams['CLOSE_200_250'] = $arParams['CLOSE_200_250'] ?? '32916.46';

        return $arParams;
    }

    /**
     * @return void
     */
    public function executeComponent(): void
    {
        $this->includeComponentTemplate();
    }

    public function calculateAction(): string
    {
        /** @noinspection PhpExpressionResultUnusedInspection */
        $this->getSignedParameters();   // Get all params in $this->arParams

        $this->calculateTotalWaterSupply();
        if (floatval($this->arParams['WATER_SUPPLY_THRESHOLD']) < $this->resultArray['water_supply_volume']) {
            $this->resultArray['success'] = false;
        } else {
            $this->resultArray['success'] = true;
            $this->calculatePlumbing();
            $this->calculateTotals();
        }

        return json_encode($this->resultArray);
    }

    /**
     * Method sends an email with calculated result
     *
     * @return string
     */
    public function sendAction(): string
    {
        /** @noinspection PhpExpressionResultUnusedInspection */
        $this->getSignedParameters();   // Get all params in $this->arParams

        $oSendResult = Event::send(array(
            'EVENT_NAME' => $this->arParams['EMAIL_EVENT_NAME'],
            'LID' => 's1',
            'C_FIELDS' => $_REQUEST
        ));

        $resultArray = array('success' => $oSendResult->isSuccess());

        return json_encode($resultArray);
    }

    /**
     * Method calculates total water supply in m3/day
     */
    private function calculateTotalWaterSupply(): void
    {
        $totalWaterSupply = floatval($_REQUEST['drinkingWater']) + $this->calculateSupplyByArea();

        $this->resultArray['water_supply_tariff'] = $this->arParams['M3_TARIFF'];
		/*
        $this->resultArray['water_supply_volume'] = sprintf('%.2f', $totalWaterSupply);
        $this->resultArray['water_supply_price_no_vat'] = sprintf('%.2f', $totalWaterSupply * $this->arParams['M3_TARIFF']);
		$this->resultArray['water_supply_price_with_vat'] = sprintf('%.2f', $totalWaterSupply * $this->arParams['M3_TARIFF'] * $this->getVat()); */
		$this->resultArray['water_supply_volume'] = number_format($totalWaterSupply, 2, '.', ' ');
        $this->resultArray['water_supply_price_no_vat'] = number_format($totalWaterSupply * $this->arParams['M3_TARIFF'], 2, '.', ' ');
        $this->resultArray['water_supply_price_with_vat'] = number_format($totalWaterSupply * $this->arParams['M3_TARIFF'] * $this->getVat(), 2, '.', ' ');
    }

    /**
     * Method calculates water supply by given area
     *
     * @return float
     */
    private function calculateSupplyByArea(): float
    {
        $result = 0.0;
        if (!empty($_REQUEST['asphalt']) || !empty($_REQUEST['soils']) || !empty($_REQUEST['pavement']) || !empty($_REQUEST['lawn'])) {
            if (0.0 < floatval($_REQUEST['asphalt'])) {
                $result += $_REQUEST['asphalt'] * self::AREA_ASPHALT_CONSTANT;
            }
            if (0.0 < floatval($_REQUEST['soils'])) {
                $result += $_REQUEST['soils'] * self::AREA_SOILS_CONSTANT;
            }
            if (0.0 < floatval($_REQUEST['pavement'])) {
                $result += $_REQUEST['pavement'] * self::AREA_PAVEMENT_CONSTANT;
            }
            if (0.0 < floatval($_REQUEST['lawn'])) {
                $result += $_REQUEST['lawn'] * self::AREA_LAWN_CONSTANT;
            }
        } else {
            $result = $_REQUEST['landArea'] * self::DEFAULT_AREA_SUPPLY_CONSTANT;
        }

        return $result;
    }

    /**
     * Method returns vat as number
     *
     * @return float
     */
    private function getVat()
    {
        return round(1 + $this->arParams['VAT_VALUE'] / 100, 2);
    }

    /**
     * Method calculates open type plumbing
     */
    private function calculatePlumbing(): void
    {
        $this->resultArray['plumbing_length'] = $_REQUEST['distance'];
        // Open type
        $tariff = $this->arParams['OPEN' . $this->defineTubeDiameter()];
		/*
        $this->resultArray['open_plumbing_price_no_vat'] = sprintf('%.2f', $_REQUEST['distance'] * $tariff);
		$this->resultArray['open_plumbing_price_with_vat'] = sprintf('%.2f', $_REQUEST['distance'] * $tariff * $this->getVat()); */
		$this->resultArray['open_plumbing_price_no_vat'] = number_format($_REQUEST['distance'] * $tariff, 2, '.', ' ');
        $this->resultArray['open_plumbing_price_with_vat'] = number_format($_REQUEST['distance'] * $tariff * $this->getVat(), 2, '.', ' ');
        // Close type
        $tariff = $this->arParams['CLOSE' . $this->defineTubeDiameter()];
		/*
        $this->resultArray['close_plumbing_price_no_vat'] = sprintf('%.2f', $_REQUEST['distance'] * $tariff);
		$this->resultArray['close_plumbing_price_with_vat'] = sprintf('%.2f', $_REQUEST['distance'] * $tariff * $this->getVat()); */
		$this->resultArray['close_plumbing_price_no_vat'] = number_format($_REQUEST['distance'] * $tariff, 2, '.', ' ');
		$this->resultArray['close_plumbing_price_with_vat'] = number_format($_REQUEST['distance'] * $tariff * $this->getVat(), 2, '.', ' ');
    }

    /**
     * Method returns tube diameter in dependence of water supply
     *
     * @return string
     */
    private function defineTubeDiameter(): string
    {
        // Water supply in liters per second
        $waterSupplyLPS = $this->resultArray['water_supply_volume'];

        if (0 < $waterSupplyLPS && 20 > $waterSupplyLPS) {
            return '_100_150';
        } elseif (20 < $waterSupplyLPS && 100 > $waterSupplyLPS) {
            return '_150_200';
        } elseif (100 < $waterSupplyLPS && 250 > $waterSupplyLPS) {
            return '_200_250';
        }
    }

    /**
     * Method calculates total values
     */
    private function calculateTotals()
    {
		/*
        $this->resultArray['open_total_no_vat'] = sprintf('%.2f', $this->resultArray['water_supply_price_no_vat'] +
            $this->resultArray['open_plumbing_price_no_vat']);
        $this->resultArray['open_total_with_vat'] = sprintf('%.2f', $this->resultArray['water_supply_price_with_vat'] +
            $this->resultArray['open_plumbing_price_with_vat']);
        $this->resultArray['close_total_no_vat'] = sprintf('%.2f', $this->resultArray['water_supply_price_no_vat'] +
            $this->resultArray['close_plumbing_price_no_vat']);
        $this->resultArray['close_total_with_vat'] = sprintf('%.2f', $this->resultArray['water_supply_price_with_vat'] +
			$this->resultArray['close_plumbing_price_with_vat']); */

		$this->resultArray['open_total_no_vat'] = number_format(
			$this->makeFloat($this->resultArray['water_supply_price_no_vat']) +
            $this->makeFloat($this->resultArray['open_plumbing_price_no_vat']), 2, '.', ' ');
        $this->resultArray['open_total_with_vat'] = number_format(
			$this->makeFloat($this->resultArray['water_supply_price_with_vat']) +
            $this->makeFloat($this->resultArray['open_plumbing_price_with_vat']), 2, '.', ' ');
        $this->resultArray['close_total_no_vat'] = number_format(
			$this->makeFloat($this->resultArray['water_supply_price_no_vat']) +
            $this->makeFloat($this->resultArray['close_plumbing_price_no_vat']), 2, '.', ' ');
        $this->resultArray['close_total_with_vat'] = number_format(
			$this->makeFloat($this->resultArray['water_supply_price_with_vat']) +
			$this->makeFloat($this->resultArray['close_plumbing_price_with_vat']), 2, '.', ' ');
    }

	/**
	 * Method converts string to float
	 *
	 * @param string $number
	 *
	 * @return flaot
	 */
	protected function makeFloat(string $number): float
	{
		return floatval(str_replace(array(',', ' '), '', $number));
	}

    /**
     * Method returns all needed params for actions
     *
     * @return string[]
     */
    protected function listKeysSignedParameters(): array
    {
        return array('M3_TARIFF', 'VAT_VALUE', 'WATER_SUPPLY_THRESHOLD', 'OPEN_100_150', 'CLOSE_100_150', 'OPEN_150_200',
            'CLOSE_150_200', 'OPEN_200_250', 'CLOSE_200_250');
    }

}