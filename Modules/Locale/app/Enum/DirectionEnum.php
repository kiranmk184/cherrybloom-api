<?php

namespace Modules\Locale\Enum;

enum DirectionEnum: string
{
    case LTR = 'ltr';
    case RTL = 'rtl';

    public static function values(): array
    {
        return [
            self::LTR->value,
            self::RTL->value,
        ];
    }
}