<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinishedProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finished_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('porcessing_pro_id');
            $table->unsignedBigInteger('sub_cat_id');
            $table->string('finished_code', 191);
            $table->string('slug', 191);
            $table->string('sizes', 191);
            $table->string('rejected_quantities', 191)->nullable();
            $table->string('quantities', 191);
            $table->date('finished_date');
            $table->string('finished_image', 191)->nullable();
            $table->text('note')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->timestamps();
            
            $table->foreign('porcessing_pro_id', 'finished_products_porcessing_pro_id_foreign')->references('id')->on('processing_products')->onDelete('cascade');
            $table->foreign('sub_cat_id', 'finished_products_sub_cat_id_foreign')->references('id')->on('sub_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('finished_products');
    }
}
