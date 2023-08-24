<?php

namespace App\Enums;

enum Shelf: int
{
    case VF = 1;
    case VS = 2;
    case BT = 3;
    case BS = 4;

    public function getLong(): string
    {
        return match ($this->value) {
            1 => 'Vivre-Frais',
            2 => 'Vivre-Sec',
            3 => 'Boutique',
            4 => 'Boisson',
        };
    }
}