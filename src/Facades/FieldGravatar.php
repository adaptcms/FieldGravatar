<?php

namespace Adaptcms\FieldGravatar\Facades;

use Illuminate\Support\Facades\Facade;

class FieldGravatar extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'FieldGravatar';
    }
}
