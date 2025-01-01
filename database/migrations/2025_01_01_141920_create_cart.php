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
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->string('color', 50);
            $table->string('size', 50);

            //foreign key
            $table->string('profile_email', 50);
            $table->unsignedBigInteger('product_id');
            //relation with profiles
            $table->foreign('profile_email')->references('profile_email')->on('profiles')->restrictOnDelete()->cascadeOnUpdate();
            //Relation with Products
            $table->foreign('product_id')->references('id')->on('Products')->restrictOnDelete()->cascadeOnUpdate();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart');
    }
};
