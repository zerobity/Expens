<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('machine_id')->nullable();
            $table->foreign('machine_id')->references('id')->on('machines')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('cascade');
            $table->integer('line');
            $table->integer('discount')->default(0);
            $table->unsignedInteger('quantity')->default(10);
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
        Schema::dropIfExists('stock');
    }
}
