<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->increments('id');
            //$table->integer('congregation_id');
            //$table->integer('staff_id');
            $table->integer('congregation_id')->unsigned();
            $table->foreign('congregation_id')->references('id')->on('congregations');
            $table->integer('staff_id')->unsigned();
            $table->foreign('staff_id')->references('id')->on('staffs');
            $table->date('service_date');
            $table->integer('regular_count');
            $table->integer('visitor_count');
            $table->text('remarks')->nullable();  
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
        Schema::drop('attendances');
    }
}
