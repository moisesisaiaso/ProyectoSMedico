<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAntecedentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('antecedentes', function (Blueprint $table) {
            $table->foreign(['paciente_id'], 'fk_antecedentes_pacientes')->references(['id'])->on('pacientes');
            $table->foreign(['user_id'], 'fk_antecedentes_users')->references(['id'])->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('antecedentes', function (Blueprint $table) {
            $table->dropForeign('fk_antecedentes_pacientes');
            $table->dropForeign('fk_antecedentes_users');
        });
    }
}
