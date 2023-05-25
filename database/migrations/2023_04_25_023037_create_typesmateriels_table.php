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
        Schema::create('typesMateriel', function (Blueprint $table) {
            $table->bigInteger('idTM', true, true);
            $table->string('logo',255)->nullable();
            $table->foreignId('idTechFK')
                ->references('idTA')
                ->on('techniques_agricole')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();            $table->string('titre', 255);
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
        Schema::dropIfExists('typesMateriel');
    }
};
