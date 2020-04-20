<?php

namespace App;

use Illuminate\Support\Facades\Facade;

//proxy for Sample class
class SampleFacade extends Facade
{
    
    protected static function getFacadeAccessor()
    {
        return 'sample';
    }

}