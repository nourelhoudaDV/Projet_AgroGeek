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
        Schema::create('varietes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('especes_id')
            ->constrained()
            ->references('id')
            ->on('especes_models')
            ->cascadeOnUpdate();
            $table->string('nomCommercial')->nullable();
            $table->string('appelationAr')->nullable();
            $table->string('quantite')->nullable();
            $table->string('precocite');
            $table->string('resistance')->nullable();
            $table->string('competitivite')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('varietes');
    }
};
