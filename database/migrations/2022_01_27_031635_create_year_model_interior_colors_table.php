<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYearModelInteriorColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('year_model_interior_colors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('year_model_id')->constrained();
            $table->foreignId('interior_color_id')->constrained();
            $table->unique(['year_model_id','interior_color_id'],'year_model_interior_color_unq');
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
        Schema::dropIfExists('year_model_interior_colors');
    }
}
