<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class OrdinalStringHelper extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'OrdinalStringHelper';
    }
}