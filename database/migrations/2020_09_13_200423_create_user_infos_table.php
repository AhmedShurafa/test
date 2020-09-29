<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('N_job');
            $table->longText('D_job');
            $table->integer('age');
            $table->string('residence');
            $table->string('address');
            $table->string('phone');
            $table->tinyInteger('free');
            $table->string('twitter');
            $table->string('facebook');
            $table->string('insta');
            $table->string('linked')->nullable();
            $table->text('image');
            $table->text('QrImage');
            $table->bigInteger('user_id');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_infos');
    }
}
