<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bullet extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'bullet',
        'price',
        'free',
        'deleted_at'
    ];

    public function user(){
        return $this->belongsToMany(User::class);
    }

    public function photo(){
        return $this->belongsToMany(Photo::class)->withTimestamps();
    }
}
