<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYearModelExteriorColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('year_model_exterior_colors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('year_model_id')->constrained();
            $table->foreignId('exterior_color_id')->constrained();
            $table->unique(['year_model_id', 'exterior_color_id'], 'year_model_exterior_color_unq');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('year_model_exterior_colors');
        Schema::enableForeignKeyConstraints();
    }
}
