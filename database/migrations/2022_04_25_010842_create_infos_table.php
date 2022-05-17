<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('whatsapp');
            $table->text('fb');
            $table->text('instagram');
            $table->text('youtube');
            $table->text('linkdin');
            $table->string('video_apropos');
            $table->string('video_support');
            $table->string('adresse');
            $table->longText('mot_president');
            $table->longText('vision');
            $table->longText('how_we_work');
            $table->longText('how_support_us');
            $table->longText('txtAdheration');
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
        Schema::dropIfExists('infos');
    }
}
