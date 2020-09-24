<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->text('certificate_text')
                ->default('Certificamos que #NOME#, inscrito sob CPF de número #CPF#, participou do #TIPO# #ATIVIDADE#, no período de #INÍCIO# a #TERMINO#, com carga horária de #CARGAHORARIA# horas.');

            $table->date('start')->nullable();
            $table->date('end')->nullable();

            $table->foreignId('activity_id')
                ->constrained('activities')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('teams');
    }
}
