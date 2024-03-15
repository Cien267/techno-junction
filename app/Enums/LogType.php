<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class LogType extends Enum
{
    CONST TYPE_CREATE_TRIP = 'createTrip';
    CONST TYPE_BUY_TRIP = 'buyTrip';
    CONST TYPE_CANCEL_TRIP = 'cancelTrip';
    CONST TYPE_CONFIRM_TRIP = 'confirmTrip';
    CONST TYPE_REQUEST_APP = 'request_app';
}
