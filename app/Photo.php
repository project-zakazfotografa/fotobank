<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'bullet_id',
        'preview',
        'photo',
        'description',
        'alt',
        'deleted_at'
    ];

    public function bullet(){
        return $this->belongsToMany(Bullet::class)->withTimestamps();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function userBullet(){
        return $this->with('bullet')->get();
    }


}
