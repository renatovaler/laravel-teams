<?php

namespace Datashaman\Teams\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'team_id',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
