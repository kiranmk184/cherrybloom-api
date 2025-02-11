<?php

namespace Modules\Locale\Enum;

use Modules\Core\Enum\EnumInterface;

enum DirectionEnum: string implements EnumInterface
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