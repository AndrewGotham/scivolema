<?php

namespace App\Enums;

enum AnswerStatus: string
{
    case Published = 'published';
    case Pending = 'pending';
    case Rejected = 'rejected';
}
