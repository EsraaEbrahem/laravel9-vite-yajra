<?php

namespace App\Enums;

use Illuminate\Validation\Rules\Enum;

final class BlogStatus extends Enum
{
    const DRAFT = "draft";
    const PUBLISHED = "published";
}
