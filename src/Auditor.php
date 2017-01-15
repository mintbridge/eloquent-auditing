<?php

namespace Mintbridge\EloquentAuditing;

use Auth;
use Request;
use Mintbridge\EloquentAuditing\Activity;

class Auditor
{
    public static function record($eventName, $model)
    {
        // save change data with event
        $activity = new Activity([
            'event' => $eventName,
            'data'  => $model->getDirty()
        ]);

        if ($ip = Request::ip()) {
            $activity->ip_address = $ip;
        }

        // set the user
        $activity->user()->associate(Auth::user());

        $model->activities()->save($activity);
    }
}
