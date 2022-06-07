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
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('student');

            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('admin');

            $table->unsignedBigInteger('book_id');
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
