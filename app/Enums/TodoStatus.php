<?php

namespace App\Enums;


enum TodoStatus: string
{

    case PENDING = 'pending';
    case ON_PROGRESS = 'on_progress';
    case COMPLETED = 'completed';

}

