<?php

namespace App\Enums;

enum SupportStatus: string
{
    case A = 'Aberto';
    case C = 'Fechado';
    case P = 'Pendente';

    public static function fromValues(string $status): string
    {
        foreach (self::cases() as $case) {
            if ($case->name === $status) {
                return $case->value;
            }
        }

        throw new \ValueError('Invalid status: ' . $status);
    }
}
