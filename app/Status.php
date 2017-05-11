<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    /**
     * Get the tasks with this status
     */
    public function tasks()
    {
        return $this->hasMany('App\Task');
    }
}
