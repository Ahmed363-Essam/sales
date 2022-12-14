<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreasuriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treasuries', function (Blueprint $table) {
            $table->id();

            $table->string('name')->unique();
            $table->boolean('is_master');
            $table->integer('last_isal_exchange'); // اخر اياصال تم صرفه
            $table->integer('last_isal_collect'); // اخر ايصال تم جمعه

            $table->unsignedBigInteger('added_by');
            $table->unsignedBigInteger('updated_by')->nullable();
         

            $table->foreign('added_by')->references('id')->on('admins')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('admins')->onDelete('cascade')->nullable();
            

            $table->tinyInteger('com_code');
            $table->date('date');
            $table->boolean('active');

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
        Schema::dropIfExists('treasuries');
    }
}
