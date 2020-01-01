<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parkings', function (Blueprint $table) {
            $table->integer('nombreDeBornesDisponibles');
            $table->integer('nombreVeloEnPark');
            $table->integer('nombresDeBornesEnStation');
            $table->string('parkActivation');
            $table->boolean('densityLevel');
            $table->string('achatPossibleEnStationCB');
            $table->integer('maxBikeOverflow');
            $table->string('etatDuTotem');
            $table->integer('nbFreeDock');
            $table->integer('nombreDeVeloMecanique');
            $table->string('parkPlus');
            $table->integer('nbDock');
            $table->integer('nombreVeloElectrique');
            $table->integer('nombreVeloEnParkPlus');
            $table->integer('codeDeLastation');
            $table->string('nomDeLaStation');
            $table->string('etatdesStations');
            $table->string('typeDeStations');
            $table->string('geo');
            $table->string('duedate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parkings');
    }
}
