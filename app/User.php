<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name', 'email', 'password',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    const ADMIN_TYPE = 'admin';

    /**
     * Returns true if user has admin type
     */
    public function isAdmin()
    {
        return $this->type === self::ADMIN_TYPE;
    }
    /**
     * Creates one to one relationship
     */
    public function shoppingcart()
    {
        return $this->hasOne(Shoppingcart::class);
    }

    /**
     * Creates one to one relationship
     */
    public function wishlist()
    {
        return $this->hasOne(Wishlist::class);
    }
    /**
     * Creates one to many relationship
     */
    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
