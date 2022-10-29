<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZoomProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zoom_products', function (Blueprint $table) {
            $table->id();
            $table->integer('cat_id');
            $table->string('product_name');
            $table->string('cat_title');
            $table->string('thumb-1');
            $table->string('thumb-2');
            $table->string('thumb-3');
            $table->string('thumb-4');
            $table->string('thumb-5');
            $table->string('350-1');
            $table->string('50-1');
            $table->string('350-2');
            $table->string('50-2');
            $table->string('350-3');
            $table->string('50-3');
            $table->string('350-4');
            $table->string('50-4');
            $table->string('350-5');
            $table->string('50-5');
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
        Schema::dropIfExists('zoom_products');
    }
}
