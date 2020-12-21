<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
protected $fillable = ['title','limit'];

   
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
