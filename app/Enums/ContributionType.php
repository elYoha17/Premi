<?php

namespace App\Enums;

enum Shelf: int
{
    case Investments = 1;
    case Others = 2;

    public function getFullname()
    {
        return match ($this->value) {
            1 => 'Investissements',
            2 => 'Autres',
        };
    }
}