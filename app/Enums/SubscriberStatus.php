<?php

namespace App\Enums;

use Illuminate\Validation\Rules\Enum;

final class SubscriberStatus extends Enum
{
    const ACTIVE = "active";
    const BLOCKED = "blocked";
}
