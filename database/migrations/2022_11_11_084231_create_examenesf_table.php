<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenesfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examenesf', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('paciente_id')->nullable()->index('fk_examenesF_pacientes');
            $table->integer('user_id')->nullable()->index('fk_examenesF_users');
            $table->string('examen_path', 255)->nullable();
            $table->text('descripcion')->nullable();
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
        Schema::dropIfExists('examenesf');
    }
}
