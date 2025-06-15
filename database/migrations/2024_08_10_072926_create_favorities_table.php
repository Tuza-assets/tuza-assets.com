<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritiesTable extends Migration
{
    public function up()
    {
        Schema::create('favorities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('email'); 
            $table->timestamps();
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('favorities');
    }
}
