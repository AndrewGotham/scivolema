<?php

namespace App\Enums;

enum UserStatus: string
{
    case Published = 'active';
    case Pending = 'inactive';
    case Rejected = 'blocked';
}
