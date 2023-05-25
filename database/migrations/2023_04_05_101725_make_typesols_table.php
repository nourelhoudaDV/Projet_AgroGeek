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
        Schema::create('typesols', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigInteger('idTS', true, true);
            $table->string('vernaculaure', 150);
            $table->string('nomDomaine', 150)->nullable();
            $table->float('teneurArgile', 10, 2, true)->nullable();
            $table->float('teneurLimon', 10, 2, true)->nullable();
            $table->float('teneurSable', 10, 2, true)->nullable();
            $table->float('teneurPhosphore', 10, 2, true)->nullable();
            $table->float('teneurPotassiume', 10, 2, true)->nullable();
            $table->float('teneurAzote', 10, 2, true)->nullable();
            $table->float('calcaireActif', 10, 2, true)->nullable();
            $table->float('calcaireTotal', 10, 2, true)->nullable();
            $table->float('conductiviteElectrique', 10, 2, true)->nullable();
            $table->float('HCC', 10, 2, true)->nullable();
            $table->float('HPF', 10, 2, true)->nullable();
            $table->float('DA', 10, 2, true)->nullable();
            $table->foreignId('ferme')
                ->constrained()
                ->references('idF')
                ->on('fermes')
                ->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('typesols');
    }
};
