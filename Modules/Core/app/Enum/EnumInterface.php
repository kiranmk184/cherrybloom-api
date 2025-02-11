<?php

namespace Modules\Core\Enum;

interface EnumInterface
{
    /**
     * Returns an array of enum values.
     * 
     * @return array
     */
    public static function values(): array;
}