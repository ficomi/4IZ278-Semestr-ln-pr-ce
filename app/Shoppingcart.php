<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shoppingcart extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'count', 'book_id', 'shoppingcart_id'
    ];
    /**
     * Creates many to many relationship with books
     */
    public function books()
    {
        return $this->belongsToMany(Books::class)->withPivot('count');
    }
    /**
     * Creates one to one relation shit with user
     */
    function user()
    {
        return $this->belongsTo(User::class);
    }
}
