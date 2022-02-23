<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class IsCreateUpdateBookForm extends Enum
{
    const Create = 0;
    const Update = 1;
}
