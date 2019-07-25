<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBreedermTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Breederm', function (Blueprint $table) {
            $table->bigIncrements('id_Breeder');
            $table->integer('idthedog');        
            $table->unsignedBigInteger('user_id');          
            $table->string('breed');      
            $table->integer('registrationspecies');
            $table->integer('nomicrochip');
            $table->string('color');
            $table->boolean('sex');
            $table->string('father');
            $table->string('momher');
            $table->date('birthday');
            $table->string('breedername');
            $table->string('owner');
            $table->date('registration date');
            $table->string('imageRC');
            $table->string('imageCP');
            $table->string('imagedog');
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
        Schema::dropIfExists('breederm');
    }
}
