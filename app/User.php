<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'user_id', 'verification_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'api'
    ];

    //custom validation rules
    public static $signup_validation_rules = [
        'email' => 'required|email|unique:users',
        'password' => 'required'
    ];

    public static $signin_validation_rules = [
        'email' => 'required|email|exists:users',
        'password' => 'required'
    ];
}
