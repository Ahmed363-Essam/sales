<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->unsignedBigInteger('account_type');
            $table->foreign('account_type')->references('id')->on('accounts_types')->onDelete('cascade');

            $table->integer('parent_account_number')->default(null);
            $table->integer('account_number');
            $table->decimal('start_balance',10,2)->comment('دائن او مدين او متزن المدة');
            $table->decimal('current_balance',10,2)->default(0);

            $table->integer('other_table_FK')->default(null);
            $table->text('notes')->default(null);

            $table->tinyInteger('is_parent')->default(0);



            $table->unsignedBigInteger('added_by');
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->foreign('added_by')->references('id')->on('admins')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('admins')->onDelete('cascade');


            
            $table->integer('com_code');
            $table->date('date');
            $table->boolean('is_archived')->default(0);









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
        Schema::dropIfExists('accounts');
    }
}
