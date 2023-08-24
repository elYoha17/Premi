<?php

namespace App\Supports\Formatters;

use Illuminate\Support\Stringable;

class NumberFormatter extends Stringable
{
    public function toQuantity(int $decimals = 0, ?string $decimal_separator = ',', ?string $thousands_separator = ' '): string
    {
        return number_format($this->value, $decimals, $decimal_separator, $thousands_separator);
    }

    public function toMoney(?string $currency = null, ?int $decimals = 0, ?string $decimal_separator = ',', ?string $thousands_separator = ' '): string
    {
        $value = $this->toQuantity($decimals ?? 0, $decimal_separator, $thousands_separator);
        $currency = $currency ?? config('premi.currency');

        return $currency ? "{$value} {$currency}" : $value;
    }

    public function toComptability(bool $show_currency = false, ?string $currency = null): string
    {
        if (!$this->value)
            return '--';
        
        return $show_currency ? $this->toMoney($currency) : $this->toQuantity();
    }
}