<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivresTable extends Migration

{
    public function up()
    {
        Schema::create('livres', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('image');
            $table->unsignedBigInteger('auteur_id');
            $table->foreign('auteur_id')->references('id')->on('auteurs')->onDelete('cascade');
            $table->string('ISBN')->unique();
            $table->unsignedBigInteger('edition_id');
            $table->foreign('edition_id')->references('id')->on('editeurs')->onDelete('cascade');
            $table->unsignedBigInteger('categorie_id');
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade'); // Correction ici
            $table->unsignedBigInteger('reduction_id')->nullable(); // Ajoutez nullable si toutes les livres n'ont pas de réduction
            $table->foreign('reduction_id')->references('id')->on('reductions')->onDelete('cascade');
            $table->string('genre');
            $table->decimal('prix', 10, 2);
            $table->decimal('ancien_prix', 10, 2)->nullable();
            $table->enum('disponibilite', ['disponible', 'non disponible'])->default('disponible');
            $table->boolean('nouveau')->nullable();
            $table->date('date_publication');
            $table->text('description');
            $table->timestamps();
        });
    }

    public function down()

    {
       
        Schema::dropIfExists('livres');
    }
}

