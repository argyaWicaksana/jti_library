<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrow_transaction', function (Blueprint $table) {
            $table->id('id');
            $table->foreign('student_id')->references('id')->on('student');
            $table->foreign('admin_id')->references('id')->on('admin');
            $table->foreign('book_id')->references('id')->on('book');
            $table->date('date_borrow');
            $table->date('date_returndata');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrow_transaction');
    }
}
