<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvItemcardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_itemcards', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // item name

            $table->tinyInteger('item_type')->comment('1- mahkzany , 2- estihlaky , 3- 3ohda'); // item type 1-   2-استهلاكية 3- عهدة 

            $table->unsignedBigInteger('inv_itemcard_categories_id'); // عامل علاقة مع تابل ال category
            $table->foreign('inv_itemcard_categories_id')->references('id')->on('inv_itemcard_categories')->onDelete('cascade');

            $table->unsignedBigInteger('parent_inv_itemcards_id')->nullable(); // self relation ship  يعني لو ليه اب
        //    $table->foreign('inv_itemcard_categories_id')->references('id')->on('inv_itemcards')->onDelete('cascade');

            $table->unsignedBigInteger('uom_id'); // وحدة اساسية
            $table->foreign('uom_id')->references('id')->on('uoms')->onDelete('cascade');


            $table->tinyInteger('does_has_retailunit'); // هل يمتلك وحدة تجزئة

            $table->unsignedBigInteger('retail_uom')->nullable(); // لو عنده وحدة تجزئة دخلها
            $table->foreign('retail_uom')->references('id')->on('uoms')->onDelete('cascade');

            $table->decimal('retail_uom_quntToParent',10,2)->nullable(); 


            $table->decimal('price',10,2)->comment('هو السعر القطاعي للوحدي الاساسية')->nullable();    // السعر القطاعي للوحدة الاساسية

            $table->decimal('nos_gomla_price',10,2)->comment('سعر النص جملة مع الوحده الاب')->nullable();    //`سعر النص جملة مع الوحده الاب	

            $table->decimal('gomla_price',10,2)->comment('السعر جملة بوحدة القياس الاساسية	')->nullable()->nullable();

            $table->decimal('price_retail',10,2)->comment('السعر القطاعي بوحدة قياس التجزئة')->nullable();

            $table->decimal('nos_gomla_price_retail',10,2)->comment('سعر النص جملة قطاعي مع الوحده التجزئة')->nullable();

            $table->decimal('gomla_price_retail',10,2)->comment('السعر الجملة بوحدة قياس التجزئة')->nullable();

            $table->decimal('cost_price',10,2)->comment('متوسط التكلفة للصنف بالوحدة الاساسية')->nullable();

            $table->decimal('cost_price_retail')->comment('متوسط التكلفة للصنف بوحدة قياس التجزئة')->nullable();

            $table->decimal('has_fixced_price')->comment('هل للصنف سعر ثابت بالفواتير  او قابل للتغير بالفواتير')->nullable();

            $table->decimal('QUENTITY',10,2)->comment('الكمية بالوحده الاب')->nullable();

            $table->decimal('QUENTITY_Retail',10,2)->comment('  كمية التجزئة المتبقية من الوحده الاب في حالة وجود وحده تجزئة للصنف')->nullable();

            $table->decimal('QUENTITY_all_Retails',10,2)->comment('  كل الكمية محولة بوحده التجزئة')->nullable();
  


            $table->unsignedBigInteger('added_by');
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->foreign('added_by')->references('id')->on('admins')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('admins')->onDelete('cascade');

            $table->string('photo');


            $table->integer('com_code');
            $table->date('date');
            $table->boolean('active');


            $table->integer('item_code');

            $table->string('barcode')->nullable();

            $table->tinyInteger('has_fixed_price');

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
        Schema::dropIfExists('inv_itemcards');
    }
}
