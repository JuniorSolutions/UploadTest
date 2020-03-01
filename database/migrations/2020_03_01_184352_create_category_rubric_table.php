<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryRubricTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_rubric', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('rubric_id')->unsigned();
            $table->foreign('rubric_id')->references('id')->on('rubrics')->onDelete('cascade');
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

        Schema::table('category_rubric', function (Blueprint $table) {
            $table->dropForeign('category_rubric_category_id_foreign');
            $table->dropForeign('category_rubric_rubric_id_foreign');
        });
        Schema::dropIfExists('category_rubric');
    }
}
