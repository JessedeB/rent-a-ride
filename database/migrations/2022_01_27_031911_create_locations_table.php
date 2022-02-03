<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->unique();
            $table->string('street', 250);
            $table->string('city', 100);
            $table->string('state',2);
            $table->string('postal_code',10);
            $table->string('country',2);
            $table->string('phone',15)->unique();
            $table->time('open_time');
            $table->time('close_time');
            $table->unique(['street','city','state']);
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
        Schema::dropIfExists('locations');
    }
}
