<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDepartment extends Model
{
    protected $fillable = [
        'user_id', 'department_id'
    ];

    // public function department(){
    //     return $this->belongsTo('App\Department');
    // }

    // public function user(){
    //     return $this->belongsTo('App\User');
    // }
}
