<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->bigInteger('receiver')->unsigned();
            $table->bigInteger('sender')->unsigned();
            $table->boolean('seen')->default(0);
            $table->foreign('receiver')->references('id')->on('users')->onDelete('cascade');    
            $table->foreign('sender')->references('id')->on('users')->onDelete('cascade');    
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
        Schema::dropIfExists('message_boxes');
    }
};
