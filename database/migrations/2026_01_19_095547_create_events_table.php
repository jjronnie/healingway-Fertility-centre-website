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
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug')->unique();

            $table->string('summary', 255);
            $table->longText('body');

            $table->string('featured_image')->nullable();

            $table->string('venue')->nullable();
            $table->date('event_date')->nullable();
            $table->time('event_time')->nullable();

               $table->date('end_date')->nullable();
            $table->time('end_time')->nullable();

            $table->enum('status', ['draft', 'published', ])->default('draft');

            $table->foreignId('created_by')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->timestamps();

            $table->index(['status', 'event_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
