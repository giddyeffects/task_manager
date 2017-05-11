<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    /**
     * Get the task associated with this thread
     */
    public function task()
    {
        return $this->belongsTo('App\Task');
    }

    /**
     * Get the user who posted this thread
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
