<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('year_model_id')->constrained();
            $table->string('vin',17);
            $table->float('mileage',7,1);
            $table->foreignId('exterior_color_id')->constrained();
            $table->foreignId('interior_color_id')->constrained();
            $table->foreignId('drivetrain_option_id')->constrained();
            $table->foreignId('location_id')->constrained();
            $table->enum('transmission',['Automatic','Manual']);
            $table->boolean('out_of_service')->default(false);
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
        Schema::dropIfExists('vehicles');
    }
}
