<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('lastName');
            $table->boolean('admin')->default(0);
            $table->string('image')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->bigInteger('city_id')->unsigned()->nullable();
            $table->string('cardNumber')->nullable();
            $table->bigInteger('bank_id')->unsigned()->nullable();
            $table->bigInteger('secretQuestion_id')->unsigned()->nullable();
            $table->string('secretAnswer')->nullable();

            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('bank_id')->references('id')->on('banks');
            $table->foreign('secretQuestion_id')->references('id')->on('SecretQuestions');
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
            $table->dropColumn('lastName');
            $table->dropColumn('admin');
            $table->dropColumn('image');
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('city_id');
            $table->dropColumn('cardNumber');
            $table->dropColumn('bank_id');
            $table->dropColumn('secretQuestion_id');
            $table->dropColumn('secretAnswer');
        });
    }
}
