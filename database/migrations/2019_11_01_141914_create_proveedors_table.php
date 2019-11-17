<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("nombre_representante_legal");
            $table->string("apellido_representante_legal");
            $table->string("documento_representante_legal");
            $table->string("telefono_representante_legal");
            $table->string("direccion_representante_legal");
            $table->string("email_representante_legal");
            $table->string("nit_empresa");
            $table->string("rason_social");
            $table->string("email_empresa")->nullable();
            $table->string("telefono_empresa")->nullable();
            $table->string("direccion_empresa")->nullable();
            $table->string("regimen");
            
            $table->text("nota")->nullable();
            $table->string("archivos")->nullable();
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
        Schema::dropIfExists('proveedors');
    }
}
