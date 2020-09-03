<?php
namespace App\Utils;

use Illuminate\Support\Facades\Artisan;

class AppInitializer
{
    public static function initDatabase()
    {
        $dbConfig = config('database.connections');
        $dbName = $dbConfig['mysql']['database'];

        Artisan::call("mysql:createdb $dbName");
        Artisan::call("db:seed");
        return $dbName;
    }
}