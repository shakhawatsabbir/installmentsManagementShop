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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('partner_id');
            $table->text('password');
            $table->text('mobile');
            $table->text('village');
            $table->text('post_office')->nullable();
            $table->text('upazila');
            $table->text('zila');
            $table->integer('total_cng')->default(0);
            $table->integer('active_cng')->default(0);
            $table->integer('closed_cng')->default(0);
            $table->integer('total_invest')->default(0);
            $table->integer('total_profit')->default(0);
            $table->integer('active_capital')->default(0);
            $table->integer('total_due_instalment')->default(0);
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
