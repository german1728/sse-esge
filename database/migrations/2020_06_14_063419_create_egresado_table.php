<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEgresadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Egresado', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('matricula', 12)->primary()->unique();
            $table->string('ap_paterno', 50);
            $table->string('ap_materno', 50);
            $table->string('nombres', 100);
            $table->string('dni', 25);
            $table->enum('genero', ['Masculino', 'Femenino'])->nullable();
            $table->date('fecha_nacimiento');
            $table->enum('nacionalidad', ['Peruana', 'Otra'])->nullable();
            $table->string('telefono', 12)->nullable();
            $table->string('lugar_origen', 200);
            $table->string('direccion_actual', 200)->nullable();
            $table->string('imagen_url', 500)->nullable();
            $table->string('cv_url', 500)->nullable();
            $table->boolean('habilitado');
            $table->integer('preparacion_id')->unsigned();
            $table->foreign('preparacion_id')->references('id')->on('Preparacion')->unique();
            $table->integer('primer_empleo_id')->unsigned()->nullable();
            $table->foreign('primer_empleo_id')->references('id')->on('PrimerEmpleo')->unique();
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('Egresado');
        Schema::enableForeignKeyConstraints();
    }
}