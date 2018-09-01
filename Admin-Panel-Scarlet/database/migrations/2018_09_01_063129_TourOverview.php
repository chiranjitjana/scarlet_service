<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TourOverview extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tour_overview', function (Blueprint $table) {
          $table->increments('tour_ov_id');
          $table->integer('tour_id');
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
          Schema::dropIfExists('tour_overview');
    }
}
