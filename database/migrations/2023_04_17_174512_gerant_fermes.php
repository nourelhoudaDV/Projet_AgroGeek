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
        Schema::create('GerantFermes', function (Blueprint $table) {
            
            $table->bigInteger('idG', true, true);

            $table->string("nomG", 100)->require();
            $table->string("prenomG", 100)->require();
            $table->string("cin", 100);
            $table->string("telephone", 100);
            $table->string("email", 100);
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
        Schema::dropIfExists('GerantFermes');
    }
};
