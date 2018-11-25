<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use Laravel\Scout\Searchable;

class Document extends Model
{
    use Searchable;

    public $asYouType = true;

    use SoftDeletes;

    protected $fillable  =[
        'document_class_id',
        'transaction_number',
        'edit_transaction_number',
        'assign_to_user_id',
        'state_id',
        'retention_id',
        'document_no',
        'subject',
        'sender',
        'origin',
        'file',
        'disposal_date'


    ];

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'document_class_id' => $this->document_class['name'],
            'transaction_number' => $this->transaction_number,
            'assign_to_user_id' => $this->assign_user['name'],
            'document_no' => $this->document_no,
            'sender' => $this->sender,
            'origin' => $this->origin,
            'subject' => $this->subject,
            'cc_users_id' => $this->cc_users,
        ];
    }

    protected $dates = ['deleted_at'];

    public function cc_users(){
        return $this->belongsToMany('App\User','document_cc_users')->withPivot('read');
    }

    public function document_cc_users(){
        return $this->belongsTo('App\Document');
    }

    public function assign_user(){
        return $this->belongsTo('App\User', 'assign_to_user_id');
    }

    public function document_class(){
        return $this->belongsTo('App\DocumentClass');
    }

    public function retention(){
        return $this->belongsTo('App\Retention');
    }

    public function state(){
        return $this->belongsTo('App\State');
    }
}

