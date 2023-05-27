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
        Schema::create('execution_technique_spe', function (Blueprint $table) {
            $table->bigInteger('idETS', true, true);
            $table->foreignId('idculture')
                ->references('idCP')
                ->on('culture_parcelles')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('idModeTech')
                ->references('idM')
                ->on('modes_technique')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('idTechSpe')
                ->references('idTS')
                ->on('techniques_specifiques')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->float('quantification', 255);
            $table->date('date')->nullable();
            $table->text('observation')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('execution_technique_spe');
    }
};
