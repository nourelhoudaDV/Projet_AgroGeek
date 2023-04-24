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
            $table->id('idV');
            $table->foreignId('espece')
            ->references(\App\Models\Espece::PK)
            ->on('especes')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->string('nomCommercial');
            $table->string('appelationAr')->nullable();
            $table->string('quantite');
            $table->string('precocite');
            $table->string('resistance');
            $table->string('competitivite');
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
