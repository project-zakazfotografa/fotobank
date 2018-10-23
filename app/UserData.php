<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserData extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'last_name',
        'birth_date',
        'experience',
        'phone',
        'site',
        'about_me',
        'city',
        'address',
        'show_orders_distance',
        'min_price',
        'currency',
        'price_for_hour',
        'currency_h',
        'deleted_at',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
