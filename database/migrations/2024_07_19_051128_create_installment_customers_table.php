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
        Schema::create('installment_customers', function (Blueprint $table) {
            $table->id();
            $table->text('installment_customer_id');
            $table->integer('customer_id');
            $table->integer('sales_id');
            $table->integer('parsent')->nullable();
            $table->integer('instalment_amount')->nullable();
            $table->integer('total_instalment')->nullable();
            $table->integer('total_instalment_amount')->nullable();
            $table->integer('pay_instalment')->nullable()->default(0);
            $table->integer('total_instalment_deposit_amount')->nullable()->default(0);
            $table->integer('due_instalment')->nullable();
            $table->integer('due_instalment_amount')->nullable();
            $table->date('instalment_deposited_date')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('installment_customers');
    }
};
