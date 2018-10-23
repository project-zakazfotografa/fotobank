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
        return $this->belongsTo(User::class);
    }

    public function photo(){
        return $this->hasMany(Photo::class);
    }
}
