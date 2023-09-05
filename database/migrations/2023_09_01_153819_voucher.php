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
            $table->string('head_description')->nullable();
            $table->string('subhead_description')->nullable();
            $table->string('payee_address')->nullable();
            $table->string('payment_date')->nullable();
            $table->string('payment_item')->nullable();
            $table->text('payment_rate')->nullable();
            $table->string('payment_amount')->nullable();
            $table->string('payable_at')->nullable();
            $table->text('payment_description')->nullable();
            $table->timestamps();
            // $table->string('payee')->nullable();
            // $table->string('payee')->nullable();
            // $table->string('payee')->nullable();
            // $table->string('payee')->nullable();
            // $table->string('payee')->nullable();
            // $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
