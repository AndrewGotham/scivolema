<?php

namespace App\Enums;

enum QuestionStatus: string
{
    case Published = 'published';
    case Pending = 'pending';
    case Rejected = 'rejected';
}
