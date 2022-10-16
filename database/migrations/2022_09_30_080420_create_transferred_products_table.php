<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferredProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transferred_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('finished_id');
            $table->unsignedBigInteger('showroom_id')->nullable();
            $table->string('transferred_code', 191);
            $table->string('slug', 191);
            $table->date('transferred_date');
            $table->string('cartoon_number', 191)->nullable();
            $table->string('transferred_quantities', 191)->nullable();
            $table->string('transferred_image', 191);
            $table->text('note')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
            
            $table->foreign('finished_id', 'transferred_products_finished_id_foreign')->references('id')->on('finished_products')->onDelete('cascade');
            $table->foreign('showroom_id', 'transferred_products_showroom_id_foreign')->references('id')->on('showrooms')->onDelete('set NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transferred_products');
    }
}
