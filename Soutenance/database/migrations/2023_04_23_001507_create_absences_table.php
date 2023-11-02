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
        Schema::create('absences', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_Etudiant")->constrained("etudiants")
            ->onDelete('restrict')
            ->onUpdate('restrict');            
            $table->date('date');
            $table->boolean('is_present')->default(false);
            $table->timestamps();

    });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('absences');
    }
};
