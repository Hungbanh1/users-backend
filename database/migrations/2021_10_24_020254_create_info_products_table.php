<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_products', function (Blueprint $table) {
            $table->string('product_name');
            $table->id();
            $table->string('cat_title');
            $table->string('screen');
            $table->string('operating_system');
            $table->string('rear_camera');
            $table->string('front_camera');
            $table->string('Chip');
            $table->string('RAM');
            $table->string('Memory');
            $table->string('Sim');
            $table->string('Pin_charger');
            $table->string('CPU');
            $table->string('hard_drive');
            $table->string('card');
            $table->string('connector');
            $table->string('special');
            $table->string('size_weight');
            $table->integer('release_time');

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
        Schema::dropIfExists('info_products');
    }
}
