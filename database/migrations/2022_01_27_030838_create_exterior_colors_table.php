<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExteriorColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exterior_colors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('manufacturer_id')->constrained();
            $table->string('name',100);
            $table->string('hex_code',6);
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
        Schema::dropIfExists('exterior_colors');
    }
}
