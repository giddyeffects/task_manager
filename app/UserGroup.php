<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    /**
     * Get the tasks in this user group
     */
    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

    /**
     * Get the user iwho created this group
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
