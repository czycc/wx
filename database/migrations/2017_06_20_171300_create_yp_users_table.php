<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYpUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yp_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('openid',180)->unique();
            $table->string('customermobile');
            $table->string('qrcode_url')->nullable();
            $table->enum('status',[0,1])->default(0)->comment('是否核销');
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
        Schema::dropIfExists('yp_users');
    }
}
