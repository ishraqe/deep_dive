<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    protected $table = 'notification';
    protected $fillable =[
        'question_id',
        'comments_id',
        'question_user_id',
        'comments_user_id',

    ];

    public function user(){
        return $this->belongsTo('\App\User');
    }

    public function question(){
        return $this->belongsTo('\App\Question');
    }
}
