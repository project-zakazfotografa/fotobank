<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;

    protected $fillable = [
      'name',
      'deleted_at'
    ];

    public function user(){
        return $this->belongsToMany(User::class, 'tag_user');
    }
}
