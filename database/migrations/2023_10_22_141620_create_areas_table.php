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
        Schema::create('areas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('empresa_id')->nullable(false)->unique;
            $table->foreign('empresa_id')
            -> references ('id')
            -> on('empresas'); 

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
        Schema::dropIfExists('areas');
    }
};
