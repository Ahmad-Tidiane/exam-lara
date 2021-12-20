<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRendezvousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rendezvouses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('passe_sanitaires_id');
            $table->date("date");
            $table->time("heure");
            $table->longText("observation");
            $table->string('type_envoi');
    
            $table->foreign('passe_sanitaires_id')
                  ->references('id')
                  ->on('passe_sanitaires')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
         
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
        Schema::dropIfExists('rendezvouses');
    }
}
