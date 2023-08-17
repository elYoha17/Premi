<?php

namespace App\Enums;

enum Shelf: int
{
    case Ordinaries = 1;
    case Purchases = 2;
    case Salaries = 3;
    case Obligations = 4;
    case Others = 5;

    public function getFullname()
    {
        return match ($this->value) {
            1 => 'Ordinaires',
            2 => 'Achats',
            3 => 'Salaires',
            4 => 'Obligations',
            5 => 'Autres',
        };
    }
}