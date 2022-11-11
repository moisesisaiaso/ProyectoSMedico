<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotivoscTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motivosc', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('paciente_id')->nullable()->index('fk_motivosC_pacientes');
            $table->integer('user_id')->nullable()->index('fk_motivosC_users');
            $table->string('planificacion_familiar', 255)->nullable();
            $table->string('descripcion_motivo', 255)->nullable();
            $table->string('descripcion_enfermedad', 255)->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('motivosc');
    }
}
