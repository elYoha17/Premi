<?php

namespace App\Enums;

enum ContributionType: int
{
    case Investments = 1;
    case Others = 255;

    public function getLong(): string
    {
        return match ($this->value) {
            1 => 'Investissements',
            255 => 'Autres',
        };
    }
}