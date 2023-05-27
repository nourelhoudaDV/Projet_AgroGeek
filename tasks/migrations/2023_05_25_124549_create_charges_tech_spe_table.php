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
        Schema::create('charges_tech_spe', function (Blueprint $table) {
            $table->bigInteger('idCh', true, true);
            $table->foreignId('idTechFK')
                ->references('idTS')
                ->on('techniques_specifiques')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('titre', 255);
            $table->string('costUnit', 50)->nullable();
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('charges_tech_spe');
    }
};
