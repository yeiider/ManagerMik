<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNominasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nominas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('trabajador_id')->unsigned();
            $table->integer('dias_trabajados');
            $table->float('sueldo_basico');
            $table->integer('horas_extras_diurna')->nullable();
            $table->integer('horas_extras_noturnas')->nullable();
            $table->float('salud')->nullable();
            $table->float('pension')->nullable();
            $table->float('arl')->nullable();
            $table->float('bonificacion')->nullable();
            $table->float('total_deducion');
            $table->float('neto_a_pagar');
            $table->float('cuentas_por_cobrar')->nullable();
            $table->float('otros')->nullable();
            $table->timestamps();

            $table->foreign('trabajador_id')->references('id')->on('empledos')
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
        Schema::dropIfExists('nominas');
    }
}
