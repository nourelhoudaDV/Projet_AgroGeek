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
        Schema::create('modes_technique', function (Blueprint $table) {
            $table->id('idM');
            $table->foreignId('idTechFK')
                ->references('idTA')
                ->on('techniques_agricole')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('titre', 255);
            $table->text('description');
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
        Schema::dropIfExists('modes_technique');
    }
};
