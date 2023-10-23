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
        Schema::create('offres', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger("product_id");
            $table->unsignedBigInteger("user_id");
            $table->string('value');
            $table->text('description');
            $table->string('image')->nullable();

            $table->foreign("product_id")->references("id")->on("products");
            $table->foreign("user_id")->references("id")->on("users");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offres');
    }
};
