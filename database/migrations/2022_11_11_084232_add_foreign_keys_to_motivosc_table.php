<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMotivoscTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('motivosc', function (Blueprint $table) {
            $table->foreign(['paciente_id'], 'fk_motivosC_pacientes')->references(['id'])->on('pacientes');
            $table->foreign(['user_id'], 'fk_motivosC_users')->references(['id'])->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('motivosc', function (Blueprint $table) {
            $table->dropForeign('fk_motivosC_pacientes');
            $table->dropForeign('fk_motivosC_users');
        });
    }
}
