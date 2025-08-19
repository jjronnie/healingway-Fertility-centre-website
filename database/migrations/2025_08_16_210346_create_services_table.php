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
        Schema::create('services', function (Blueprint $table) {
             $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('photo')->nullable(); // store path to uploaded image
            $table->string('icon')->nullable();  // store icon name/class
            $table->string('desc')->nullable();  // short description
            $table->longText('body')->nullable(); // CKEditor formatted HTML
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
