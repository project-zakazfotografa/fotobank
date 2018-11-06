<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BulletUser extends Model
{
    protected $table = 'bullet_user';

    protected $fillable = [
      'user_id',
      'bullet_id',
    ];
}
