<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntecedentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedentes', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('paciente_id')->nullable()->index('fk_antecedentes_pacientes');
            $table->integer('user_id')->nullable()->index('fk_antecedentes_users');
            $table->string('personales', 255)->nullable();
            $table->string('familiares', 255)->nullable();
            $table->string('obstetricos', 255)->nullable();
            $table->string('ginecologos', 255)->nullable();
            $table->string('vacunacion', 255)->nullable();
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
        Schema::dropIfExists('antecedentes');
    }
}
