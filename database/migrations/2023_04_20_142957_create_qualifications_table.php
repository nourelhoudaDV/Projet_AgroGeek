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
        $table->bigInteger('idTM', true, true);;
        $table->string('nom', 150);
        $table->text('description')->nullable();
        $table->unsignedInteger('techniqueA_id');
        $table->foreign('techniqueA_id')->references('idTA')->on('technique_agricoles')->onDelete('cascade');
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
