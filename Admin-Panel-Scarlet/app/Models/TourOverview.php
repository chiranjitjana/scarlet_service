<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourOverview extends Model
{
  protected $table = 'TourOverview';
  public $timestamps = false;
  protected $fillable = ['cover_image','description','created_date','created_by'];
}
