<?php

namespace Linky\Tracker\Facades;

use Illuminate\Support\Facades\Facade;

class Linky extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Linky\Tracker\Services\LinkyClient::class;
    }
}