<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookBorrowTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_borrow_transaction', function (Blueprint $table) {
            $table->id();
            $table->string('book_id')->nullable();
            $table->string('borrow_transaction_id')->nullable();
            $table->foreign('book_id')->references('id')->on('book');
            $table->foreign('borrow_transaction_id')->references('id')->on('borrow_transaction');
            $table->integer('number_book_borrow');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_borrow_transaction');
    }
}
