<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('location',50)->unique();
            $table->string('province');
            $table->string('city');
            $table->string('verify')->comment('验证码');
            $table->smallInteger('towel')->default(8)->comment('毛巾礼品');
            $table->smallInteger('award')->default(2)->comment('另外三种礼品');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
