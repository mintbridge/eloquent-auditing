<?php

namespace Mintbridge\EloquentAuditing;

use Auth;
use Mintbridge\EloquentAuditing\Activity;
use Request;

class Auditor
{
    public static function record($eventName, $model)
    {
        // save photo to the loaded model
        $action = new Activity([
            Activity::ATTR_EVENT      => $eventName,
            Activity::ATTR_DATA       => $model->getAuditableData($eventName),
            Activity::ATTR_IP_ADDRESS => Request::ip(),
        ]);

        // set the user
        $action->user()->associate(Auth::user());

        $model->activities()->save($action);
    }
}
