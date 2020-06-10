<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'author', 'image', 'genre', 'language', 'published_in', 'price'
    ];
    public function shoppingcart()
    {
        return $this->belongsToMany(Shoppingcart::class)->withPivot('count');
    }

    public function order()
    {
        return $this->belongsToMany(Order::class)->withPivot('count');
    }
}
