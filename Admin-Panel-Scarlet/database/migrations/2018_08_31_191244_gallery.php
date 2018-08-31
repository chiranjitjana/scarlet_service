<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Gallery extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
      Schema::create('gallery', function (Blueprint $table) {
          $table->increments('gallery_id');
          $table->string('cover_image');
          $table->string('gallery_type');
          $table->longText('description');
          $table->date('created_date');
          $table->bigInteger('created_by');
      });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
      Schema::dropIfExists('gallery');
  }
}
