<?php

namespace Datashaman\Teams\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'role',
        'team_id',
    ];

    public function user()
    {
        return $this->belongsTo(config('teams.user'));
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
