<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
  public function getCompletedAttribute($value){
     return (boolean)$value;
  }

  protected $fillable = ['body', 'completed'];
}
