<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class ShippingBearerStatus extends Enum
{
    const Seller = 1;
    const Buyer = 2;


    /**
     * Get the description for an enum value
     *
     * @param $value
     * @return string
     */
    public static function getDescription($value): string
    {
        switch ($value){
            case self::Seller:
                return '出品者';
                brake;
            case self::Buyer:
                return '購入者';
                brake;
            default:
                return self::getKey($value);
        }
    }
}
