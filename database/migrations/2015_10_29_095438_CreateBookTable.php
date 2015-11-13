<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('bustype_id');
            $table->string('fname');
            $table->string('lname');
            $table->dateTime('birthday');
            $table->string('adress');
            $table->integer('contact_no');
            $table->string('seatname');
            $table->string('ticket_number');
            $table->string('reference_number');
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
        Schema::drop('book');
    }
}
