<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exp_cat_id');
            $table->string('expense_reason', 191);
            $table->string('slug', 191);
            $table->double('amount', 10, 2);
            $table->date('expense_date');
            $table->string('expense_image', 191)->nullable();
            $table->text('note')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
            
            $table->foreign('exp_cat_id', 'expenses_exp_cat_id_foreign')->references('id')->on('expense_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
