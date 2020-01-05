<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name', 50);
            $table->text('description', 100);
            $table->string('class', 20);
            $table->string('type', 20);
            $table->string('category', 50);

            $table->float('price', 5, 2);
            $table->integer('stock');
            $table->integer('score');

            $table->string('model', 50)->nullable();
            $table->string('size', 20)->nullable();

            $table->longText('image');

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
        Schema::dropIfExists('product');
    }
}
