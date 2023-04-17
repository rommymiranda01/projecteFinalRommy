<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('partits', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_jornada')->unsigned();
            $table->foreign('id_jornada')->references('id')->on('jornadas');
            $table->bigInteger('id_equip_local')->unsigned();
            $table->foreign('id_equip_local')->references('id')->on('teams');
            $table->bigInteger('id_equip_visitant')->unsigned();
            $table->foreign('id_equip_visitant')->references('id')->on('teams');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partits');
    }
};
