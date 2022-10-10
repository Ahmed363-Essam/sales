<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();

            $table->integer('supplier_code');

            $table->unsignedBigInteger('supplier_categories_id');
            $table->foreign('supplier_categories_id')->references('id')->on('supplier_categories')->onDelete('cascade');



            $table->string('name');
            $table->unsignedBigInteger('account_number');
            $table->foreign('account_number')->references('id')->on('accounts')->onDelete('cascade');


            $table->integer('start_balance_status')->comment('0-balance 1-credit 2-debit');


            $table->decimal('start_balance', 10, 2)->comment('دائن او مدين او متزن المدة');
            $table->decimal('current_balance', 10, 2)->default(0);



            $table->integer('city_id')->nullable();

            $table->text('address')->nullable();


            //$table->string('phone')->nullable();





            $table->text('notes')->nullable();


            $table->unsignedBigInteger('added_by');
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->foreign('added_by')->references('id')->on('admins')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('admins')->onDelete('cascade');



            $table->integer('com_code');
            $table->date('date');
            $table->boolean('active')->default(0);


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
        Schema::dropIfExists('suppliers');
    }
}
