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
        Schema::create('Patners', function (Blueprint $table) {
            $table->id();
            $table->string('fullname', 40);
            $table->string('username', 40);
            $table->string('email', 40);
            $table->string('password', 255);
            $table->string('phone', 15);
            $table->text('address');
            $table->tinyInteger('status')->default(1);
            $table->string('remember_token',255);
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
        Schema::dropIfExists('owners');
    }
};
