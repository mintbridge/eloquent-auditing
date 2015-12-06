<?php

namespace Mintbridge\EloquentAuditing;

use Illuminate\Support\Facades\Facade;

class AuditorFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'auditor';
    }
}
