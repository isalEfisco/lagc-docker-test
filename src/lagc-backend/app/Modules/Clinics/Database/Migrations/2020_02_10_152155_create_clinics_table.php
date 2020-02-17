<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinics', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name', 255);
            $table->string('phone', 13);
            $table->string('address', 255);
            $table->double('insured_patients_percent')
                ->nullable();
            $table->double('uninsured_patients_percent')
                ->nullable();
            $table->integer('size');
            $table->string('ownership')
                ->nullable();
            $table->boolean('active')
                ->default(false);

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
        Schema::dropIfExists('clinics');
    }
}
