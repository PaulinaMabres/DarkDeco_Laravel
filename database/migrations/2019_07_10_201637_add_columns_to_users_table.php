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
            $table->string('apellido');
            $table->boolean('admin');
            $table->string('telefono');
            $table->string('domicilio');
            $table->string('foto');
            $table->string('numTarjeta');
            $table->string('respSecreta');
            $table->bigInteger('city_id')->unsigned()->nullable();
            $table->bigInteger('bank_id')->unsigned()->nullable();
            $table->bigInteger('pregSecreta_id')->unsigned()->nullable();

            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('bank_id')->references('id')->on('banks');
            $table->foreign('pregSecreta_id')->references('id')->on('preguntas_secretas');
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
            $table->dropColumn('apellido');
            $table->dropColumn('admin');
            $table->dropColumn('telefono');
            $table->dropColumn('domicilio');
            $table->dropColumn('foto');
            $table->dropColumn('numTarjeta');
            $table->dropColumn('respSecreta');
            $table->dropColumn('localidad_id');
            $table->dropColumn('banco_id');
            $table->dropColumn('pregSecreta_id');
        });
    }
}
