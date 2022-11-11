<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignosvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signosv', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('paciente_id')->nullable()->index('fk_signosV_pacientes');
            $table->integer('user_id')->nullable()->index('fk_signosV_users');
            $table->string('presionArS', 255)->nullable();
            $table->string('presionArD', 255)->nullable();
            $table->string('presionArM', 255)->nullable();
            $table->string('temperatura', 255)->nullable();
            $table->string('peso', 255)->nullable();
            $table->string('talla', 255)->nullable();
            $table->string('iMC', 255)->nullable();
            $table->string('perimetroAbdominal', 255)->nullable();
            $table->string('glucosaCapilar', 255)->nullable();
            $table->string('vHemoglobina', 255)->nullable();
            $table->string('vHemoglobinaC', 255)->nullable();
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
        Schema::dropIfExists('signosv');
    }
}
