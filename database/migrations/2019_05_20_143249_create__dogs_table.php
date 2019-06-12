<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_dogs', function (Blueprint $table) {
            $table->integer('IDthedog');        
            $table->unsignedBigInteger('user_id');          
            $table->string('Breed');      
            $table->integer('Registrationspecies');
            $table->integer('Nomicrochip');
            $table->string('color');
            $table->boolean('SEX');
            $table->string('Father');
            $table->string('Momher');
            $table->date('birthday');
            $table->string('Breedername');
            $table->string('Owner');
            $table->date('Registration date');
            $table->string('imageRC');
            $table->string('imageCP');
            $table->string('imagedog');
            $table->timestamps();
           
        });
        //Schema::table('_dogs', function (Blueprint $table) { $table->foreign('user_id')->references('id')->on('users'); }); 
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_dogs');
    }
}
