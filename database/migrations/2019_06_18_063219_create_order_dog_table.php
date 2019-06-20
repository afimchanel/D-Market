<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_dog', function (Blueprint $table) {
            $table->bigIncrements('Order_ID');
            $table->integer('id_post');
            $table->integer('id_the_dog');
            $table->integer('Purchase_status');
            $table->string('Order_Date');
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
        Schema::dropIfExists('order_dog');
    }
}
