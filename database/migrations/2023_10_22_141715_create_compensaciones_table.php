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
        Schema::create('compensaciones', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('contrato_id')->nullable(false)->unique;
            $table->foreign('contrato_id')
            -> references ('id')
            -> on('contratos');

            $table->decimal('monto', 10, 2);

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
        Schema::dropIfExists('compensaciones');
    }
};
