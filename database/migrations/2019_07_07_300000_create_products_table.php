<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('nombre');
            $table->bigInteger('color_id')->unsigned()->nullable();
            $table->string('foto', 500);
            $table->decimal('precio',6,2);
            $table->string('descripcion', 255);
            $table->integer('stock');
            $table->bigInteger('categoria_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('color_id')->references('id')->on('colors');
            $table->foreign('categoria_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
