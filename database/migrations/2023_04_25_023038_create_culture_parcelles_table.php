<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @retur
     */
    public function up()
    {
        Schema::create('culture_parcelles', function (Blueprint $table) {
            $table->bigInteger('idCP', true, true);
            $table->foreignId('varieteID')
                ->constrained()
                ->references('idV')
                ->on('varietes');
            $table->foreignId('parcelleId')
                ->constrained()
                ->references('idp')
                ->on('parcelles');
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
        Schema::dropIfExists('culture_parcelles');
    }
};
