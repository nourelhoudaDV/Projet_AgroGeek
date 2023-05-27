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
        Schema::create('charge_execution', function (Blueprint $table) {
            $table->bigInteger('idCE', true, true);
            $table->foreignId('idExcuTech')
                ->references('idETS')
                ->on('execution_technique_spe')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->float('montant', 255)->nullable();
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
        Schema::dropIfExists('charge_execution');
    }
};
