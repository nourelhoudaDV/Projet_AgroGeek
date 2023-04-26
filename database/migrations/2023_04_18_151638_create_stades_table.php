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
        Schema::create('stades', function (Blueprint $table) {
            $table->id('idS');
            $table->string('nom',150);
            $table->string('phaseFin',150);
            $table->foreignId('espece')
                ->constrained()
                ->references(\App\Models\Espece::PK)
                ->on('especes')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
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
        Schema::dropIfExists('stades');
    }
};
