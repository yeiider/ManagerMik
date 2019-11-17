<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAportesSSGSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aportes_s_s_g_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->integer('codigo');
            $table->bigInteger('nomina_id')->unsigned()->unique();
            $table->string('tipo_cuenta')->nullable();
            $table->float('tipo_cuentatipo_cuenta');
            $table->float('valor');
            $table->timestamps();
            $table->foreign('nomina_id')->references('id')->on('nominas')
            ->onDelete('cascade')
            ->onUpdate('cascade');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aportes_s_s_g_s');
    }
}
