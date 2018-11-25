<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentCCUser extends Model
{
    protected $fillable = ['read'];

    public function documents(){
        return $this->belongsTo('App\Document');
    }

    protected $table = 'document_cc_users';//
}
