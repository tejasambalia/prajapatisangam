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
        'contact', 'password', 'user_id', 'verification_code'
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
        'contact' => 'required|numeric|unique:users|digits:10',
        'password' => 'required'
    ];

    public static $signin_validation_rules = [
        'contact' => 'required|numeric|exists:users|digits:10',
        'password' => 'required'
    ];

    public static $handle_verify_validation_rules = [
        'contact' => 'required|numeric|exists:users|digits:10',
        'verification_code' => 'required|numeric|exists:users|digits:5'
    ];
}
