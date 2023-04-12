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
            $table->engine = "InnoDB";
            $table->bigInteger('idV', true, true);
            $table->foreignId('espece')
            ->constrained()
            ->references('ide')
            ->on('especes')
            ->cascadeOnUpdate();
            $table->string('nomCommercial');
            $table->string('appelationAr')->nullable();
            $table->string('qualite')->nullable();
            $table->string('precocite')->nullable();
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
