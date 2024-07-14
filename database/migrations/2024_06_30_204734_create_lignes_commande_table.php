<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLignesCommandeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
        public function up()
    {
        Schema::create('lignes_commande', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('commande_id')->unsigned();
            $table->foreign('commande_id')->references('id')->on('commandes');
            $table->bigInteger('livre_id')->unsigned();
            $table->foreign('livre_id')->references('id')->on('livres');
            $table->integer('quantite');
            $table->decimal('prix_unitaire', 10, 2);
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
        Schema::dropIfExists('lignes_commande');
    }
}
