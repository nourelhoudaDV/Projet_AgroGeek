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
        Schema::create('stadeVarietes', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigInteger('idS', true, true);
            $table->string('nom',150);
            $table->string('phaseFin',150);
            $table->foreignId('espece')
            ->constrained()
            ->references('ide')
            ->on('especes')
            ->cascadeOnUpdate();
            $table->foreignId('variete')
            ->constrained()
            ->references('idV')
            ->on('varietes')
            ->cascadeOnUpdate();
            $table->float('sommesTemps',10,2);
            $table->float('sommesTempFroid',20,2);
            $table->float('Kc',10,2);
            $table->float('enracinement',10,2);
            $table->string('maxEnracinement',1);
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
        Schema::dropIfExists('stadevarietes');
    }
};
