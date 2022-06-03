<?php

namespace App\Enum;

enum TableStatus:string
{
    case Pending = 'pending';
    case Avaliable = 'avaliable';
    case Unavaliable = 'unavaliable';
}

