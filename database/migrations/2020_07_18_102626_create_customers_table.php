<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fname');
            $table->string('lname');
            $table->text('nic');
            $table->integer('mobile');
            $table->string('email');
            $table->integer('gender');
            $table->text('line1');
            $table->text('line2');
            $table->text('line3');
            $table->text('province');
            $table->text('district');
            $table->text('city');
            $table->text('country');
            $table->text('zipcode');
            $table->date('checkin');
            $table->date('checkout');
            $table->unsignedBigInteger('room_type_id');
            $table->foreign('room_type_id') ->references('id')->on('room_types');
            $table->text('smoking');
            $table->text('wifi');
            $table->integer('no_of_guest');
            $table->text('room_no');
            $table->text('password');
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
        Schema::dropIfExists('customers');
    }
}
