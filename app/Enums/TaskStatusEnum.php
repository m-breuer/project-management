<?php

namespace App\Enums;

enum TaskStatusEnum: int
{
    case Pending = 1;
    case InProgress = 2;
    case OnHold = 3;
    case Done = 4;
    case Cancelled = 5;
}
