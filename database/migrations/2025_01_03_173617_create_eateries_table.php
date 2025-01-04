<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateEateriesTable extends Migration
{
    public function up()
    {
        Schema::create('eateries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location');
            $table->text('description')->nullable();
            $table->integer('requests_count')->default(0); // Field for tracking requests
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('eateries');
    }
}
