<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriveTrainOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivetrain_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('year_model_id')->constrained();
            $table->enum('drivetrain', ['FWD', 'RWD', 'AWD', '4WD']);
            $table->unique(['year_model_id', 'drivetrain']);
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
        Schema::dropIfExists('drivetrain_options');
        Schema::enableForeignKeyConstraints();
    }
}
