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
            $table->string('logo',255)->nullable();
            $table->string('nomDomaine',150);
            $table->string('fullNameG',150);
            $table->string('cin',15);
            $table->string('contactG',15)->nullable();
            $table->float('SAT',10,2)->nullable();
            $table->float('SAU',10,2)->nullable();
            $table->text('observation')->nullable();
            $table->string('fixe',15)->nullable();
            $table->string('fax',15)->nullable();
            $table->string('GSM1',15)->nullable();
            $table->string('GSM2',15)->nullable();
            $table->string('email',150)->nullable();
            $table->string('siteWeb',150)->nullable();
            $table->string('Douar',100)->nullable();
            $table->string('Cercle',100)->nullable();
            $table->string('province',100)->nullable();
            $table->string('region',100)->nullable();
            $table->text('adresse')->nullable();
            $table->string('gps',255)->nullable();
            $table->string('ville',100)->nullable();
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
