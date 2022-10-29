<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMixProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mix_products', function (Blueprint $table) {
            $table->id();
            $table->integer('cat_id');
            $table->text('cat_title');
            $table->string('title');
            $table->string('product_name');
            $table->string('product_title');
            $table->string('price');
            $table->text('code');
            $table->string('product_desc');
            $table->string('product_thumb');
            $table->string('product_content');
            $table->softDeletes();

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
        Schema::dropIfExists('mix_products');
    }
}
