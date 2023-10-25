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
        Schema::create('evaluaciones', function (Blueprint $table) {
            $table->id();

            $table->string('nombre', 64);

            $table->unsignedBigInteger('contrato_evaluador_id')->nullable(false)->unique;
            $table->foreign('contrato_evaluador_id')
            -> references ('id')
            -> on('contratos');

            $table->unsignedBigInteger('contrato_evaluado_id')->nullable(false)->unique;
            $table->foreign('contrato_evaluado_id')
            -> references ('id')
            -> on('contratos');

            $table->decimal('porcentaje', 10, 2);

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
        Schema::dropIfExists('evaluaciones');
    }
};
