<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeOffers extends Model
{
  public $timestamps = false;
  protected $fillable = ['image_path','description','start_date','end_date','created_date','created_by'];
}
