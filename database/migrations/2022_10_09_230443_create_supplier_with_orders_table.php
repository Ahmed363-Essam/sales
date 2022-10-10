<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierWithOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_with_orders', function (Blueprint $table) {
            $table->id();


            $table->tinyInteger('order_type');

            $table->integer('auto_serial');

            $table->integer('DOC_NO');

            $table->date('order_date');

            $table->unsignedBigInteger('supplier_code');
            $table->foreign('supplier_code')->references('supplier_code')->on('suppliers')->onDelete('cascade');


            $table->boolean('is_approved')->default(0);

          $table->string('notes')->nullable();

            $table->tinyInteger('discount_type')->nullable();

            $table->decimal('discount_percent',10,2)->default(0);

            $table->decimal('discount_value',10,2)->default(0); //قيمة الخصم

            $table->decimal('tax_percentage',10,2)->nullable(); // قيمة الضريبة

            $table->decimal('tax_value',10,2)->nullable(); //قيمة الضريبة القيمة المضافة

            $table->decimal('total_before_discount',10,2);

            $table->decimal('total_cost',10,2); // القيمة الاجمالية النهائية للفاتورة


            $table->integer('account_number');

            $table->decimal('money_for_account',10,2);

            $table->tinyInteger('pill_type'); // نوع الفاتورة  كاش - الي

            $table->decimal('what_paid',10,2)->default(0);

            $table->decimal('what_remained',10,2)->default(0);


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
        Schema::dropIfExists('supplier_with_orders');
    }
}
