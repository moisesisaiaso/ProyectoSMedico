<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTratamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tratamientos', function (Blueprint $table) {
            $table->foreign(['paciente_id'], 'fk_tratamientos_pacientes')->references(['id'])->on('pacientes');
            $table->foreign(['user_id'], 'fk_tratamientos_users')->references(['id'])->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tratamientos', function (Blueprint $table) {
            $table->dropForeign('fk_tratamientos_pacientes');
            $table->dropForeign('fk_tratamientos_users');
        });
    }
}
