<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('historiaClinica')->nullable();
            $table->string('sexo')->nullable();
            $table->string('grupoSanguineo')->nullable();
            $table->string('fechaNacimiento')->nullable();
            $table->string('edad')->nullable();
            $table->string('peso')->nullable();
            $table->string('talla')->nullable();
            $table->string('indiceMC')->nullable();
            $table->string('presionArterial')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
