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
            $table->id();
            $table->text('product_id');
            $table->text('name');
            $table->text('delar_id')->nullable();
            $table->text('delar_name')->nullable();
            $table->integer('category_id')->nullable();
            $table->text('model')->nullable();
            $table->text('detail_one')->nullable();
            $table->text('detail_two')->nullable();
            $table->text('detail_three')->nullable();
            $table->text('detail_four')->nullable();
            $table->integer('qty')->nullable()->default(0);
            $table->integer('buy_price')->nullable()->default(0);
            $table->text('image')->nullable()->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
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
