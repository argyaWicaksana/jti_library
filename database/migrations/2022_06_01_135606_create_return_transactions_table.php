<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('return_transaction', function (Blueprint $table) {
            $table->id('id');
            $table->integer('fine');
            $table->foreign('borrow_transaction_id')->references('id')->on('borrow_transaction');
            $table->date('date_returnday');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('return_transaction');
    }
}
