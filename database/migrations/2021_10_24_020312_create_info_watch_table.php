<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoWatchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_watch', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('Screen');
            $table->string('time_charger');
            $table->string('operating_system');
            $table->string('face');
            $table->string('health_features');
            $table->string('company');

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
        Schema::dropIfExists('info_watch');
    }
}
