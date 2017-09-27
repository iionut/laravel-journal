<?php
/**
 * Created by PhpStorm.
 * User: liviu
 * Date: 25.09.2017
 * Time: 15:51
 */

namespace Iionut\LaravelJournal\Facade;


use Illuminate\Support\Facades\Facade;

class Journal extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Journal';
    }
}
