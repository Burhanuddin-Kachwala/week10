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
        Schema::create('products', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 255);
            $table->text('description');
            $table->string('image_path', 255);
            $table->decimal('price', 10, 2);
            $table->integer('quantity');
            $table->string('slug', 255)->unique();
            $table->unsignedBigInteger('category_id'); 
            $table->unsignedBigInteger('author_id');
            $table->enum('status', ['active', 'inactive', 'out_of_stock'])->default('active');
            $table->timestamps();

            // Fix the foreign key constraint
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
