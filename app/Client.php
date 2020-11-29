<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
   // protected $hidden = ["created_at", "updated_at"];
    public $fillable = ['name', 'surname', 'yearofbirth'];

}
