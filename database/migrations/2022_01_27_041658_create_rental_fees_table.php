<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_fees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rental_id')->constrained();
            $table->foreignId('fee_type_id')->constrained();
            $table->double('amount',11,2,true);
            $table->multiLineString('note');
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
        Schema::dropIfExists('rental_fees');
    }
}
