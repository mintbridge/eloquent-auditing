<?php

namespace Mintbridge\EloquentAuditing;

use Auth;
use Mintbridge\EloquentAuditing\Activity;

class Auditor
{
    public static function record($eventName, $model)
    {
        // save photo to the loaded model
        $action = new Activity([
            'event' => $eventName,
            'data'  => $model->getDirty()
        ]);

        // set the user
        $action->user()->associate(Auth::user());

        $model->activities()->save($action);
    }
}
