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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_Etudiant")->constrained("etudiants")
            ->onDelete('restrict')
            ->onUpdate('restrict'); 
            $table->foreignId("id_Course")->constrained("courses")
            ->onDelete('restrict')
            ->onUpdate('restrict');
            $table->float('note1');
            $table->float('note2');
            $table->float('note3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};

