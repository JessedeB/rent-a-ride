<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_classes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('description', 500);
            $table->double('daily_rate', 11, 2, true);
            $table->double('weekly_rate', 11, 2, true);
            $table->double('monthly_rate', 11, 2, true);
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
        Schema::dropIfExists('rental_classes');
        Schema::enableForeignKeyConstraints();
    }
}
