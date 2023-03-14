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
        Schema::create('jugadors', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('cognom');
            $table->integer('dorsal');
            $table->date('data_naixement');
            $table->string('posicio');
            $table->string('foto');
            $table->bigInteger('id_team')->unsigned();
            $table->foreign('id_team')->references('id')->on('teams');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jugadors');
    }
};
