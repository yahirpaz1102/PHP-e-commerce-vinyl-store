<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id');
            $table->string('sku', 20)->unique();
            $table->string('name', 100);
            $table->text('description');
            $table->text('full_description')->nullable();
            $table->decimal('price', 10, 2);
            $table->text('image_url')->nullable();
            $table->text('audio_snippet_url')->nullable();
            $table->integer('rating')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
