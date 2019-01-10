<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Servises extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'servise_name',
        'free_of_charge',
        'cost',
        'type'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
