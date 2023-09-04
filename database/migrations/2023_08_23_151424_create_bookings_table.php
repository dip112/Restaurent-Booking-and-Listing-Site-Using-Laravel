<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            // $table->id();
            $table->increments('booking_id');
            $table->integer('booking_user_id');
            $table->integer('booking_res_id');
            $table->integer('booking_phone');
            $table->integer('booking_childs');
            $table->integer('booking_adults');
            $table->date('booking_date');
            $table->string('booking_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
