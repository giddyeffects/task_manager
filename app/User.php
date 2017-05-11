<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'firstname', 'lastname', 'email', 'password', 'phone', 'phone_ext'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the user's department.
     */
    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    /**
     * Get the user's role.
     */
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    /**
     * Get the tasks user has created
     */
    public function created_tasks()
    {
        return $this->hasMany('App\Tasks', 'creator_id');
    }

    /**
     * Get the tasks user has been assigned
     */
    public function assigned_tasks()
    {
        return $this->hasMany('App\Tasks', 'assigned_id');
    }

    /**
     * Get the threads user has posted
     */
    public function threads()
    {
        return $this->hasMany('App\Thread');
    }

    /**
     * Get the user groups the user has created
     */
    public function user_groups()
    {
        return $this->hasMany('App\UserGroup');
    }

    /**
     * Get the user groups the user is a member of
     */
    public function user_group_members()
    {
        return $this->hasMany('App\UserGroupMember');
    }
}
