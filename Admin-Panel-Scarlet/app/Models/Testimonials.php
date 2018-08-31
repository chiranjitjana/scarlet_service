<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model
{
  public $timestamps = false;
  protected $fillable = ['user_name','avtar','rating','feedback','profession','created_date','created_by'];
}
