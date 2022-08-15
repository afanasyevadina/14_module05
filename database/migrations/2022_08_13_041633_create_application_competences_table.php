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
        Schema::create('application_competences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->nullable()->constrained();
            $table->integer('competence_id')->nullable();
            $table->integer('level_id')->nullable();
            $table->timestamps();
            $table->foreign('competence_id')->references('id')->on('competences');
            $table->foreign('level_id')->references('id')->on('levels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('application_competences');
    }
};
