<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentClass extends Model
{
    protected $fillable = ['name','tag'];

    public function document(){
        return $this->hasMany('App\Document');
    }
}
