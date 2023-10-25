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
        Schema::create('puestos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('departamento_id')->nullable(false)->unique;
            $table->foreign('departamento_id')
            -> references ('id')
            -> on('departamentos'); 

            $table->string('nombre', 64)->nullable(false);
            $table->mediumText('descripcion')->nullable(false);

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
        Schema::dropIfExists('puestos');
    }
};
