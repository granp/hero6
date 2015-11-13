<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('purchase', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('bustype_id');
            $table->string('invoice_no');
            $table->dateTime('invoice_date');
            $table->integer('seat_count');
            $table->string('address');
            $table->string('contact_no');
            $table->string('total_fare');
            $table->string('total_payment');
            $table->string('payment_option');
            $table->string('transaction_no');
            // $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            // $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
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
        schema::drop('purchase');
    }
}
