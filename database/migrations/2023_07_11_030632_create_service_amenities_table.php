<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_amenities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('service_id')->unsigned();
            $table->bigInteger('amenity_id')->unsigned();
            $table->timestamps();

            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');

            $table->foreign('amenity_id')->references('id')->on('amenities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_amenities');
    }
};
