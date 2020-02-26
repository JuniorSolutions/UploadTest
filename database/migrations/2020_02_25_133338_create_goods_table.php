<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rubric_1', 100)->nullable();
            $table->string('rubric_2', 100);
            $table->string('category', 100);
            $table->string('manufacturer', 100);
            $table->string('product_name', 100);
            $table->string('code', 100);
            $table->longText('description');
            $table->decimal('price', 8, 2);
            $table->integer('warranty')->nullable();
            $table->string('presence', 100);
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
        Schema::dropIfExists('goods');
    }
}
