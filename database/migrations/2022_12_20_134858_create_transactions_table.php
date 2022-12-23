<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->string('invoice_id');
            $table->string('payment_id');
            $table->string('payment_status');
            $table->integer('transaction_status');
            $table->integer('amount');
            $table->integer('total_amount');
            $table->string('customer_number');
            $table->string('nickname');
            $table->string('product_id');
            $table->string('product_code');
            $table->string('channel_category');
            $table->string('channel_code');
            $table->string('qr_string');
            $table->string('va_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
