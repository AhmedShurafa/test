<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNameArToColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name_ar');
            $table->string('nameJob_ar');
            $table->string('residence_ar');
            $table->string('address_ar');
            $table->string('D_job_ar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropIfExists('name_ar');
            $table->dropIfExists('nameJob_ar');
            $table->dropIfExists('residence_ar');
            $table->dropIfExists('address_ar');
            $table->dropIfExists('D_job_ar');
        });
    }
}
