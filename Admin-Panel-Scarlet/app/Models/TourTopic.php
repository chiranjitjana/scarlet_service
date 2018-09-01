<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourTopic extends Model
{
  protected $table = 'TourTopic';
  public $timestamps = false;
  protected $fillable = ['cover_image','tour_type','topic_name','description','created_date','created_by'];
}
