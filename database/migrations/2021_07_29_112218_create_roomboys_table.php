<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomboysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roomboys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fname');
            $table->string('lname');
            $table->date('dob');
            $table->integer('gender');
            $table->text('mobile_no');
            $table->text('nic');
            $table->string('email')->unique();
            $table->string('line1');
            $table->string('line2');
            $table->string('line3');
            $table->string('city');
            $table->string('district');
            $table->string('province');
            $table->string('country');
            $table->string('zipcode');
            $table->unsignedBigInteger('user_type_id');
            $table->foreign('user_type_id') ->references('id')->on('user_types');
            $table->string('emp_no')->nullable();
            $table->integer('status');
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
        Schema::dropIfExists('roomboys');
    }
}
