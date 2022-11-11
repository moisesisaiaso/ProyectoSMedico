<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLugaresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lugaresa', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('paciente_id')->nullable()->index('fk_lugaresA_pacientes');
            $table->integer('user_id')->nullable()->index('fk_lugaresA_users');
            $table->string('tipo_atencion', 255)->nullable();
            $table->string('lugar_atencion', 255)->nullable();
            $table->string('grupo_prioritario', 255)->nullable();
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
        Schema::dropIfExists('lugaresa');
    }
}
