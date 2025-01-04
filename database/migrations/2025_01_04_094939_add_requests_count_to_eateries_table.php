<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRequestsCountToEateriesTable extends Migration
{
    public function up()
    {
        Schema::table('eateries', function (Blueprint $table) {
            $table->integer('requests_count')->default(0); // Add requests_count column
        });
    }

    public function down()
    {
        Schema::table('eateries', function (Blueprint $table) {
            $table->dropColumn('requests_count'); // Remove requests_count column
        });
    }
}
