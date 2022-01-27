<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('vehicle_id')->constrained();
            $table->foreignId('pickup_location')->references('id')->on('locations');
            $table->foreignId('return_location')->nullable()->references('id')->on('locations');
            $table->float('pickup_mileage',7,2,true);
            $table->float('return_mileage',7,2,true)->nullable();
            $table->dateTime('expected_pickup_time');
            $table->dateTime('actual_pickup_time')->nullable()->default(null);
            $table->dateTime('expected_return_time');
            $table->dateTime('actual_return_time')->nullable()->default(null);
            $table->boolean('damage_occurred')->default(false);
            $table->boolean('fees_accrued')->default(false);
            $table->boolean('paid_in_full')->default(false);
            $table->enum('status',['Reserved','Rented','Returned'])->default('Reserved');
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
        Schema::dropIfExists('rentals');
    }
}
