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
        Schema::create('modes_techniques', function (Blueprint $table) {
            $table->id('idMT');
            $table->string('nom', 150);
            $table->text('description');
            $table->foreignId('techniqueA')->constrained('techniques_agricoles');
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
        Schema::dropIfExists('modes_techniques');
    }
};
