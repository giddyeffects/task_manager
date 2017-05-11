<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    /**
     * Get the task associated with this document
     */
    public function task()
    {
        return $this->belongsTo('App\Task');
    }
}
