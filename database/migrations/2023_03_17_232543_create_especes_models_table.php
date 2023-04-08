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
        Schema::create('especes_models', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigInteger('id' , true , true);
            $table->string('nom')->nullable();
            $table->string('nomCommercial')->nullable();
            $table->string('appelationAr')->nullable();
            $table->string('categorieEspece')->nullable();
            $table->string('typeEnracinement');
            $table->string('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('especes_models');
    }
};
