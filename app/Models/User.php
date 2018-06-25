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

    public function addresses()
    {
        return $this->hasMany(UserAddress::class);
    }

    /**
     * belongsToMany() 方法用于定义一个多对多的关联，
     * 第一个参数是关联的模型类名，第二个参数是中间表的表名。
     * withTimestamps() 代表中间表带有时间戳字段。
     * orderBy('user_favorite_products.created_at', 'desc') 代表
     * 默认的排序方式是根据中间表的创建时间倒序排序。
     * @return $this
     */
    public function favoriteProducts()
    {
        return $this->belongsToMany(Product::class, 'user_favorite_products')
            ->withTimestamps()
            ->orderBy('user_favorite_products.created_at', 'desc');
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}
