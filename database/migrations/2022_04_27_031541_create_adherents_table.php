<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdherentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('adherents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->string('adresse');
            $table->string('image');
            $table->string('lieu_naissance');
            $table->string('nationalite');
            $table->date('date_naissance');
            $table->string('ville');
            $table->string('profession');
            $table->string('cin');
            $table->string('niveau_scolaire');
            $table->string('nom_titure')->default("--");
            $table->string('prenom_titure')->default("--");
            $table->string('email_titure')->default("--");
            $table->string('tel_titure')->default("--");
            $table->string('cin_titure')->default("--");
            $table->boolean('read_statu');

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
        Schema::dropIfExists('adherents');
    }
}
