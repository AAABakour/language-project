<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNameAndLocationToResturantsTable extends Migration
{
    public function up()
    {
        Schema::table('resturants', function (Blueprint $table) {
            $table->string('name')->after('id'); // Add the name column after the id
            $table->string('location')->after('name'); // Add the location column after the name
        });
    }

    public function down()
    {
        Schema::table('resturants', function (Blueprint $table) {
            $table->dropColumn(['name', 'location']); // Drop the columns if rolling back
        });
    }
}
