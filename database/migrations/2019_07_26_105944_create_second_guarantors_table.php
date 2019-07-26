<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecondGuarantorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('second_guarantors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('nic')->unique();
            $table->string('mobile');
            $table->string('lanline');
            $table->integer('customerid');
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
        Schema::dropIfExists('second_guarantors');
    }
}
