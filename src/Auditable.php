<?php

namespace Mintbridge\EloquentAuditing;

use Auditor;
use Config;

trait Auditable
{
    /**
     * Setup the events when the model is booted
     */
    protected static function bootAuditable()
    {
        foreach (static::getAuditableEvents() as $eventName) {
            static::$eventName(function (AuditableInterface $model) use ($eventName) {
                Auditor::record($eventName, $model);
            });
        }
    }

    /**
     * Set the default events to be recorded if the $auditableEvents
     * property does not exist on the model.
     *
     * @return array
     */
    protected static function getAuditableEvents()
    {
        if (isset(static::$auditableEvents)) {
            return static::$auditableEvents;
        }

        return Config::get('auditing.events');
    }

    /**
     * Get all of the activities performed on the model
     */
    public function activities()
    {
        return $this->morphMany(Config::get('auditing.activity'), 'auditable');
    }
}
