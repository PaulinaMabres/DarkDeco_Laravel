<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('user_id')->unsigned()->nullable();
            $table->date('fecha');
            $table->bigInteger('producto_id')->unsigned()->nullable();
            $table->float('precio');
            $table->integer('cantidad');
            $table->boolean('status');
            $table->string('foto');
            $table->string('nombreProducto');
            $table->text('description');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('producto_id')->references('id')->on('products');


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
        Schema::dropIfExists('carts');
    }
}
