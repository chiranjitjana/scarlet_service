<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourList extends Model
{
  protected $table = 'TourList';
  public $timestamps = false;
  protected $fillable = ['cover_image','tour_id','tour_nationality','tour_place_name','description','created_date','created_by'];
}
