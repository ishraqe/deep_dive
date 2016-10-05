<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable =[
        'tag_name',
        'description',

    ];


    public function question(){
        return $this->hasMany('\App\Question');
    }

    public function getTagname() {
        return $this->tag_name;
    }
}
