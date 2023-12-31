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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('payee')->nullable();
            $table->string('station')->nullable();
            $table->string('head')->nullable();
            $table->string('subhead')->nullable();
            $table->string('item')->nullable();
            $table->string('item_description')->nullable();
            $table->string('head_description')->nullable();
            $table->string('subhead_description')->nullable();
            $table->string('payee_address')->nullable();
            $table->string('payment_date')->nullable();
            $table->text('payment_description')->nullable();
            $table->text('payment_rate')->nullable();
            $table->text('payment_amount')->nullable();
            $table->string('payment_amount_total')->nullable();
            $table->string('payable_at')->nullable();
            $table->string('voucher_owner')->nullable();
            $table->string('voucher_type')->nullable();
            $table->timestamps();
       
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
