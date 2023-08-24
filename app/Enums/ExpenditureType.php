<?php

namespace App\Enums;

enum ExpenditureType: int
{
    case Ordinaries = 1;
    case Purchases = 2;
    case Salaries = 3;
    case Obligations = 4;
    case Others = 255;

    public function getLong(): string
    {
        return match ($this->value) {
            1 => 'Ordinaires',
            2 => 'Achats',
            1 => 'Salaires',
            1 => 'Obligations',
            255 => 'Autres',
        };
    }
}