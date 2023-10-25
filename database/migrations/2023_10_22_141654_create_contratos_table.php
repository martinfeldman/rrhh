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
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('empleado_id')->nullable(false)->unique;
            $table->foreign('empleado_id')
            -> references ('id')
            -> on('empleados');


            $table->unsignedBigInteger('puesto_id')->nullable(false)->unique;
            $table->foreign('puesto_id')
            -> references ('id')
            -> on('puestos');


            $table->unsignedInteger('categoria_contrato_id')->nullable(false)->unique;
            $table->foreign('categoria_contrato_id')
            -> references ('id')
            -> on('categorias_contratos');

            $table->string('salario', 10, 2)->nullable(false);
            $table->date('inicio')->nullable(false);
            $table->timestamp('fin')->nullable();

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
        Schema::dropIfExists('contratos');
    }
};
