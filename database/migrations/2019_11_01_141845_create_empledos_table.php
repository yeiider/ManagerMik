<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpledosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empledos', function (Blueprint $table) {
            $table->bigIncrements('id');
           
            $table->string("nombre");
            $table->string("apellido");
            $table->string("documento");
            $table->string("contrato");
            $table->string("tipo_contrato");
            $table->string("genero");
            $table->string("email")->nullable();
            $table->string("telefono")->nullable();
            $table->string("direccion")->nullable();
            $table->string("inicio_trabajar");
            $table->string('numero_cuenta');
            $table->float("sueldo_basico");
            $table->text("nota")->nullable();
            $table->string("archivos")->nullable();
            $table->string("clave_huella")->nullable();
            
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
        Schema::dropIfExists('empledos');
    }
}
