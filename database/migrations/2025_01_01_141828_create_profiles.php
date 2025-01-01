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
            $table->string('fName', 30)->unique();
            $table->string('lName', 30)->unique();
            $table->string('mobile', 30)->unique();
            $table->string('shippingAddress', 30)->unique();
            $table->string('email', 30)->unique();
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
