<?php

namespace App\Models;

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
        'name', 'email', 'password','email_verified',
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
     * $casts 属性提供了一个便利的方法来将数据库字段值转换为常见的数据类型，
     * $casts 属性应是一个数组，且数组的键是那些需要被转换的字段名，
     * 值则是你希望转换的数据类型。支持转换的数据类型有：
     * integer，real，float，double，string，boolean，object，array，
     * collection，date，datetime 和 timestamp。
     * @var array
     */
    protected $casts = [
        'email_verified'=>'boolean',
    ];
}
