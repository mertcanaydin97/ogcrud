<?php

namespace OG\OGCRUD\Facades;

use Illuminate\Support\Facades\Facade;

class OGCRUD extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @method static string image($file, $default = '')
     * @method static $this useModel($name, $object)
     *
     * @see \OG\OGCRUD\OGCRUD
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ogcrud';
    }
}
