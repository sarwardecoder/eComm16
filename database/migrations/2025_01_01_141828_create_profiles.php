<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->string('firstName', 50);
            $table->string('lastName', 50);
            $table->string('mobile', 50);
            $table->string('shippingAddress', 50);
            $table->string('profile_email', 30)->unique();
            //relationship with users table
            $table->foreign('profile_email', 30)->references('email')->on('users')->restrictOnDelete()->cascadeOnUpdate();

            $table->timestamps()->useCurrent();
            $table->timestamps()->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
