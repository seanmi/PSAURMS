<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = ['name', 'order'];

    public function document(){
        return $this->hasMany('App\Document');
    }
}
