<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('etudiant_course', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_Etudiant');
            $table->unsignedBigInteger('id_Course');
            // Ajoutez d'autres colonnes si nécessaire
            $table->timestamps();

            $table->foreign('id_Etudiant')->references('id')->on('etudiants')->onDelete('cascade');
            $table->foreign('id_Course')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('etudiant_course');
    }
};
