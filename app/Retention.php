<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retention extends Model
{
    protected $fillable = ['name', 'm', 'y'];

    public function document(){
        return $this->hasMany('App\Document');
    }
}
