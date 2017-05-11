<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Task active record model
 */
class Task extends Model
{
    /**
     * Get the user who created the task
     */
    public function creator()
    {
        return $this->belongsTo('App\User', 'creator_id');
    }
    /**
     * Get the user who's assigned the task
     */
    public function assigned()
    {
        return $this->belongsTo('App\User', 'assigned_id');
    }

    /**
     * Get the task status
     */
    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    /**
     * Get the task category
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * Get the task's user group
     */
    public function user_group()
    {
        return $this->belongsTo('App\UserGroup');
    }

    /**
     * Get any tags the task has
     */
    public function tags()
    {
        return $this->hasMany('App\Tag');
    }

    /**
     * Get any uploaded documents the task has
     */
    public function documents()
    {
        return $this->hasMany('App\Documents');
    }

    /**
     * Get the threads posted about this task
     */
    public function threads()
    {
        return $this->hasMany('App\Thread');
    }
}
