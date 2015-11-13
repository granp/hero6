<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bustickets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('bustype_id');
            $table->string('reference_no');
            $table->string('invoice_no');
            $table->string('fname');
            $table->string('lname');
            $table->dateTime('birthday');
            $table->string('address');
            $table->string('contact_no');
            $table->string('seatname');
            $table->string('busfare');
            $table->string('origin');
            $table->string('destination');
            $table->dateTime('departure_datetime');
            // $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            // $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->timestamps();
            // $table->primary(['id', 'reference_no', 'invoice_no']);
            $table->unique(['reference_no', 'invoice_no']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::drop('bustickets');
    }
}
