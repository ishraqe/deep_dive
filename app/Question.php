<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
   protected $fillable =[
       'title',
       'body',
       'tag_id',
       'user_id',
       'marking',
      'parent_id',
      'parent_answer_id',

   ];
   public function user(){
      return $this->belongsTo('\App\User');
   }
   public function tag(){
      return $this->belongsTo('\App\Tag');
   }
   public function notification(){
      return $this->hasMany('\App\Notification');
   }
}