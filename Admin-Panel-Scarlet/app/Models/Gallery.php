<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'Gallery';
    public $timestamps = false;
    protected $fillable = ['gallery_type','cover_image','description','created_date','created_by'];
}
