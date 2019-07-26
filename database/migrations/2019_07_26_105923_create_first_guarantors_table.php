<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFirstGuarantorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('first_guarantors', function (Blueprint $table) {
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
        Schema::dropIfExists('first_guarantors');
    }
}
