<?php
namespace App\Models\Traits;

trait HasNameFieldTrait
{

    /**
     * Use this to retrieve a model by it's name
     *
     * @param String $name the name that we are searching for
     * @return static|bool An instance of the model or false if no instance is found
     */
    public static function fetchByName(String $name) {

        $models = static::where('name', '=', $name)->get();

        return count($models) ? $models[0] : false;
    }
}
