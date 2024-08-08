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
        Schema::create('instalments', function (Blueprint $table) {
            $table->id();
            $table->text('customer_id');
            $table->text('installment_customer_id');
            $table->integer('instalment_amount');
            $table->text('method')->nullable();
            $table->date('date');
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instalments');
    }
};
