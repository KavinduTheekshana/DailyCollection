<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('customer');
            $table->string('route');
            $table->bigInteger('firstguarantor');
            $table->bigInteger('secondguarantor');
            $table->string('paymenttype');
            $table->double('amount', 8, 2);
            $table->double('remain', 8, 2);
            $table->double('installment', 8, 2);
            $table->double('totalincome', 8, 2);
            $table->date('datepurchased');
            $table->date('duedate');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('transactions');
    }
}
