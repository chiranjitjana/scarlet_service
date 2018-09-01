<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Contacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('contact_us_query', function (Blueprint $table) {
          $table->increments('contact_id');
          $table->string('user_name');
          $table->string('email');
          $table->string('phone');
          $table->string('desitnation');
          $table->string('field_of_study');
          $table->string('profession');
          $table->longText('comments');
          $table->date('created_date');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_us_query');
    }
}
