<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_offers', function (Blueprint $table) {
            $table->increments('offer_id');
            $table->string('image_path');
            $table->longText('description');
            $table->date('start_date');
            $table->date('end_date');
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
        Schema::dropIfExists('home_offers');
    }
}
