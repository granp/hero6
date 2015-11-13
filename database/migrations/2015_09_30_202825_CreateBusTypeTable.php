<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bustype', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bustype_name');
            $table->integer('seat_row');
            $table->json('seatmap_json');
            $table->dateTime('departure_datetime');
            $table->dateTime('arrival_datetime');
            $table->double('seat_price');
            $table->integer('route_id');
            $table->integer('status');
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
        Schema::drop('routes');
    }
}
