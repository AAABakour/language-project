<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        // Assuming 'users' is the table where user data is stored
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

        // Assuming 'restaurants' is the table where restaurant data is stored
        $table->foreignId('resturant_id')->constrained('resturants')->onDelete('cascade');
        $table->float('price')->default(0);
        $table->float('destination')->default(0);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
