<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGroupMember extends Model
{
    /**
     * Get the user in this user group
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the user group
     */
    public function user_group()
    {
        return $this->belongsTo('App\UserGroup');
    }
}
