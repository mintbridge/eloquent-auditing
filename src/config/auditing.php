<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Default Auditing Events
    |--------------------------------------------------------------------------
    |
    | The default events to record if none have been specified on the model
    |
    */
    'events' => [
        'created',
        'updated',
        'deleted',
    ],

    /*
    |--------------------------------------------------------------------------
    | Activity Model
    |--------------------------------------------------------------------------
    |
    | The model to be used for recording events
    |
    */
    'activity' => Mintbridge\EloquentAuditing\Activity::class,

    /*
    |--------------------------------------------------------------------------
    | User Model
    |--------------------------------------------------------------------------
    |
    | The user model to associate with the recorded event, defaults to the auth
    | user model
    |
    */
    'user' => Config::get('auth.model'),
];
