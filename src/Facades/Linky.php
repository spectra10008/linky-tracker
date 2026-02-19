<?php

namespace Sadah\Linky\Facades;

use Illuminate\Support\Facades\Facade;

class Linky extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Sadah\Linky\Services\LinkyClient::class;
    }
}