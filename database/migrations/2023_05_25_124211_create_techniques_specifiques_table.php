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
        Schema::create('techniques_specifiques', function (Blueprint $table) {
            $table->bigInteger('idTS', true, true);
            $table->string('logo',255);
            $table->foreignId('idTechFK')
                ->references('idTA')
                ->on('techniques_agricole')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('titre', 255);
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
        Schema::dropIfExists('techniques_specifiques');
    }
};
