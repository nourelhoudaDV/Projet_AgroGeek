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
        Schema::create('mesure_quantification', function (Blueprint $table) {
            $table->bigInteger('idMQ', true, true);
            $table->foreignId('idquantification')
                ->references('idQT')
                ->on('qualifications')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('idculture')
                ->references('idCP')
                ->on('culture_parcelles')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->float('mesure', 255);
            $table->date('date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mesure_quantification');
    }
};
