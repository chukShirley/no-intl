<?php

declare(strict_types=1);

namespace NoIntl\View\Helper;

final class CurrencyFormat extends \Zend\I18n\View\Helper\CurrencyFormat
{
    public function __construct()
    {
    }

    /**
     * Format a number
     *
     * @param  float  $number
     * @param  string $currencyCode
     * @param  bool   $showDecimals
     * @param  string $locale
     * @param  string $pattern
     * @return string
     */
    protected function formatCurrency(
        $number,
        $currencyCode,
        $showDecimals,
        $locale,
        $pattern
    ) {
        return '$' . number_format($number, 2);
    }
}