<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * Get the users in this deparment
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }

    /**
     * Get the categories in this deparment
     */
    public function categories()
    {
        return $this->hasMany('App\Category');
    }

    /**
     * Get the manager of the department
     */
    public function manager()
    {
        return $this->belongsTo('App\User', 'manager_id');
    }
}
