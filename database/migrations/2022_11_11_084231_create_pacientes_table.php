<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id')->nullable()->index('fk_pacientes_users');
            $table->string('name', 255)->nullable();
            $table->string('historiaClinica', 255)->nullable();
            $table->string('sexo', 255)->nullable();
            $table->string('grupoSanguineo', 255)->nullable();
            $table->string('fechaNacimiento', 255)->nullable();
            $table->string('edad', 255)->nullable();
            $table->string('peso', 255)->nullable();
            $table->string('talla', 255)->nullable();
            $table->string('indiceMC', 255)->nullable();
            $table->string('presionArterial', 255)->nullable();
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
        Schema::dropIfExists('pacientes');
    }
}
