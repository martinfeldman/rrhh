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
        Schema::create('domicilios', function (Blueprint $table) {
            $table->id();

            $table->string('calle', 64)->nullable(false);
            $table->smallInteger('numero', 64)->nullable(false);

            $table->unsignedInteger('provincia_id')->nullable(false)->unique;
            $table->foreign('provincia_id')
            -> references ('id')
            -> on('provincias');

            $table->unsignedInteger('municipio_id')->nullable(false)->unique;
            $table->foreign('municipio_id')
            -> references ('id')
            -> on('municipios');

            $table->smallInteger('piso')->nullable();
            $table->char('departamento')->nullable();

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
        Schema::dropIfExists('domicilios');
    }
};
