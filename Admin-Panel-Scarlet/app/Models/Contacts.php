<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
  protected $table = 'Contacts';
  public $timestamps = false;
  protected $fillable = ['user_name','email','phone','desitnation','field_of_study','profession','comments','created_date'];
}
