<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMealItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('item_name');
            $table->text('item_description');
            $table->unsignedBigInteger('item_price');
            $table->unsignedBigInteger('offer_id');
            $table->foreign('offer_id') ->references('id')->on('offers');
            $table->text('offer_type');
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
        Schema::dropIfExists('meal_items');
    }
}
