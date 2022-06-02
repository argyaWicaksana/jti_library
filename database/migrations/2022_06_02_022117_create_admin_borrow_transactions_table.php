<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminBorrowTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_borrow_transaction', function (Blueprint $table) {
            $table->id();
            $table->string('admin_id')->nullable();
            $table->string('borrow_transaction_id')->nullable();
            $table->foreign('admin_id')->references('id')->on('admin');
            $table->foreign('borrow_transaction_id')->references('id')->on('borrow_transaction');
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
        Schema::dropIfExists('admin_borrow_transaction');
    }
}
