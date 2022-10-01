<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreasuriesDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treasuries_deliveries', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('treasuries_id');
            $table->unsignedBigInteger('treasuries_can_delivery');
            $table->foreign('treasuries_id')->references('id')->on('treasuries')->onDelete('cascade')->comment('الخزنة التي سوف تستلم ');
            $table->foreign('treasuries_can_delivery')->references('id')->on('treasuries')->onDelete('cascade')->comment('الخزنة التي سيتم تسليمها');


            $table->unsignedBigInteger('added_by');
            $table->unsignedBigInteger('updated_by');

            $table->foreign('added_by')->references('id')->on('admins')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('admins')->onDelete('cascade')->nullable();
            
            $table->integer('com_code');


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
        Schema::dropIfExists('treasuries_deliveries');
    }
}
