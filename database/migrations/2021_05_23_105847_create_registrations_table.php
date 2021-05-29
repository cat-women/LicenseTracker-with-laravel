<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();            
            $table->string('name');
            $table->string('docType');
            $table->string('docNum')->unique();
            $table->string('branch');
            $table->string('trafficName');
            $table->string('offence');
            $table->integer('fine')->unsigned();
            $table->integer('count')->unsigned();
            $table->boolean('flag'); 
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
        Schema::dropIfExists('registrations');
    }
}
