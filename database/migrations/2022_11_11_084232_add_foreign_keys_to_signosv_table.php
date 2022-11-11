<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSignosvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('signosv', function (Blueprint $table) {
            $table->foreign(['paciente_id'], 'fk_signosV_pacientes')->references(['id'])->on('pacientes');
            $table->foreign(['user_id'], 'fk_signosV_users')->references(['id'])->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('signosv', function (Blueprint $table) {
            $table->dropForeign('fk_signosV_pacientes');
            $table->dropForeign('fk_signosV_users');
        });
    }
}
