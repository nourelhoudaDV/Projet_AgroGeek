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
        Schema::create('parcelles', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigInteger('idp', true, true);
            $table->string('codification',50)->nullable();
            $table->foreignId('Ferme')
            ->constrained()
            ->references('idF')
            ->on('fermes')
            ->cascadeOnUpdate();
            $table->float('superficie',10,2);
            $table->string('modeCulture',50);
            $table->string('topographie',255)->nullable();
            $table->float('pente',10,2)->nullable();
            $table->float('pierosite',10,2)->nullable();
            $table->string('gps',255)->nullable();
            $table->text('description')->nullable();
            $table->foreignId('typeSol')
            ->constrained()
            ->references('idTS')
            ->on('typesols')
            ->cascadeOnUpdate()
            ->nullable();
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
        Schema::dropIfExists('parcelles');
    }
};
