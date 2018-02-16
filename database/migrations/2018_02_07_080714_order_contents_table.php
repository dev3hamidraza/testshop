<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("order_id");
            $table->integer("product_id");
            $table->double('price');
            $table->integer("qty")->unsigned();
            $table->double('total');
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order_contents');
    }
}
