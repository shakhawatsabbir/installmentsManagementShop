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
        Schema::create('sales', function (Blueprint $table) {

            $table->id();
            $table->integer('customer_id');
            $table->integer('discount')->default(0);
            $table->integer('sales_amount');
            $table->text('sales_type')->nullable()->default('Cash');
            $table->integer('pay_amount')->nullable();
            $table->integer('due_amount')->nullable();
            $table->text('payment_type')->nullable();
            $table->text('payment_transaction_id')->nullable();
            $table->integer('profit')->default(0);
            $table->string('currency')->default('BDT');
            $table->text('reff_name')->nullable();
            $table->tinyInteger('status')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
