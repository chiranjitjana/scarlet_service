<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TourTopic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tour_topic', function (Blueprint $table) {
          $table->increments('tour_id');
          $table->string('tour_type');
          $table->string('topic_name');
          $table->longText('cover_image');
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
      Schema::dropIfExists('tour_topic');
    }
}
