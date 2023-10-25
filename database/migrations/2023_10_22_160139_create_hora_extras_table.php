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
        Schema::create('hora_extras', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('contrato_id')->nullable(false)->unique;
            $table->foreign('contrato_id')
            -> references ('id')
            -> on('contratos');

            $table->timestamp('inicio')->nullable(false);
            $table->timestamp('fin')->nullable(false);

            $table->decimal('importe', 10, 2);

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
        Schema::dropIfExists('hora_extras');
    }
};
