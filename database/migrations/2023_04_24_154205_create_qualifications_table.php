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
    Schema::create('qualifications', function (Blueprint $table) {
        $table->bigInteger('idQT', true, true);
        $table->text('logo')->nullable();
        $table->foreignId('idTechFK')
            ->references('idTA')
            ->on('techniques_agricole')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
        $table->string('titre', 255)->nullable();
        $table->string('unite', 50)->nullable();
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
        Schema::dropIfExists('qualifications');
    }
};
