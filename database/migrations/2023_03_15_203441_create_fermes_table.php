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
        Schema::create('fermes', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigInteger('idF', true, true);
            $table->string('logo')->nullable();
            $table->string('nomDomaine');
            $table->string('fullNameG');
            $table->string('contactG')->nullable();
            $table->string('SAT')->nullable();
            $table->string('SAU')->nullable();
            $table->text('observation')->nullable();
            $table->string('fixe')->nullable();
            $table->string('fax')->nullable();
            $table->string('GSM1')->nullable();
            $table->string('GSM2')->nullable();
            $table->string('email')->nullable();
            $table->string('siteWeb')->nullable();
            $table->string('Douar')->nullable();
            $table->string('Cercle')->nullable();
            $table->string('province')->nullable();
            $table->string('region')->nullable();
            $table->text('adresse')->nullable();
            $table->string('gps')->nullable();
            $table->string('ville')->nullable();
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
        Schema::dropIfExists('fermes');
    }
};
