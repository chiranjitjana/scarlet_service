<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TourList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tour_list', function (Blueprint $table) {
          $table->increments('tour_list_id');
          $table->integer('tour_id');
          $table->string('tour_nationality');
          $table->string('tour_place_name');
          $table->longText('description');
          $table->longText('cover_image');
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
        Schema::dropIfExists('tour_list');
    }
}
