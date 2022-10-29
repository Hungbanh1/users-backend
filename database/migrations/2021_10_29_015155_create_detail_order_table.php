<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_order', function (Blueprint $table) {
            // tên khóa ngoại-> lien ket vs id -> trong bang order
            $table->id();
            $table->char('cat_title');
            $table->string('product_name');
            $table->string('product_thumb');
            $table->integer('price');
            $table->integer('qty');
            $table->integer('sub_total');
            $table->text('status');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
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
        Schema::dropIfExists('detail_order');
    }
}
