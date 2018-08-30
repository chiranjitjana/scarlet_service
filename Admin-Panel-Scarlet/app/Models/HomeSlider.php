<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeSlider extends Model
{
  public $timestamps = false;
  protected $fillable = ['image_path','description','created_date','created_by'];
}
