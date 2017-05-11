<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Get the tasks in this category
     */
    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

    /**
     * Department this Category belongs to
     */
    public function department()
    {
        return $this->belongsTo('App\Department', 'dept_id');
    }
}
