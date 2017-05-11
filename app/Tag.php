<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * Get the task with this tag
     */
    public function task()
    {
        return $this->belongsTo('App\Task');
    }

    /**
     * Get the user who created the tag and owns the task
     */
    public function task_owner()
    {
        return $this->belongsTo('App\User', 'task_owner_id');
    }
    /**
     * Get the user who's tagged in this task
     */
    public function tagged_user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
