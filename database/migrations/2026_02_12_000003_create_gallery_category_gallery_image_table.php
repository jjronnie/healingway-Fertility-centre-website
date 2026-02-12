<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gallery_category_gallery_image', function (Blueprint $table) {
            $table->unsignedBigInteger('gallery_category_id');
            $table->unsignedBigInteger('gallery_image_id');

            $table->unique(['gallery_category_id', 'gallery_image_id'], 'gallery_category_image_unique');

            $table->foreign('gallery_category_id')
                ->references('id')
                ->on('gallery_categories')
                ->onDelete('cascade');

            $table->foreign('gallery_image_id')
                ->references('id')
                ->on('gallery_images')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gallery_category_gallery_image');
    }
};
