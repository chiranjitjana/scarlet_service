<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Testimonials extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('testimonials', function (Blueprint $table) {
        $table->increments('testimonial_id');
        $table->string('user_name');
        $table->string('avtar');
        $table->string('profession');
        $table->bigInteger('rating');
         $table->longText('feedback');
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
        Schema::dropIfExists('testimonials');
    }
}
