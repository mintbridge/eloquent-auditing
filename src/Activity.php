<?php

namespace Mintbridge\EloquentAuditing;

use Config;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    const ATTR_ID             = 'id';
    const ATTR_AUDITABLE_ID   = 'auditable_id';
    const ATTR_AUDITABLE_TYPE = 'auditable_type';
    const ATTR_USER_ID        = 'user_id';
    const ATTR_EVENT          = 'event';
    const ATTR_DATA           = 'data';
    const ATTR_IP_ADDRESS     = 'ip_address';
    const ATTR_CREATED_AT     = 'created_at';
    const ATTR_UPDATED_AT     = 'updated_at';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'activities';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        self::ATTR_CREATED_AT,
        self::ATTR_UPDATED_AT,
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        self::ATTR_DATA => 'array',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::ATTR_EVENT,
        self::ATTR_DATA,
        self::ATTR_IP_ADDRESS,
    ];

    /**
     * Get the user that the perform the action.
     *
     * @return object
     */
    public function user()
    {
        return $this->belongsTo(Config::get('auditing.user'), self::ATTR_USER_ID);
    }

    /**
     * Get all of the owning auditable models.
     */
    public function auditable()
    {
        return $this->morphTo();
    }
}
