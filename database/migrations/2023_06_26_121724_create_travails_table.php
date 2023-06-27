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
        Schema::disableForeignKeyConstraints();

        Schema::create('travails', function (Blueprint $table) {
            $table->id();
            $table->string('matricule', 250);
            $table->string('titre', 250);
            $table->string('image', 250)->nullable();
            $table->string('categorie', 250)->nullable();
            $table->string('annee_academique', 250)->nullable();
            $table->string('code_classification', 250)->nullable();
            $table->string('nbre_pages', 250);
            $table->decimal('viewCount', 8, 2)->default(0);
            $table->string('path', 250);
            $table->foreignId('etudiant_id')->constrained();
            $table->foreignId('domaine_id')->constrained();
            $table->boolean('publier')->default(0);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travails');
    }
};