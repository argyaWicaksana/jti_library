<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminReturnTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_return_transaction', function (Blueprint $table) {
            $table->id();
            $table->string('admin_id')->nullable();
            $table->string('return_transaction_id')->nullable();
            $table->foreign('admin_id')->references('id')->on('admin');
            $table->foreign('return_transaction_id')->references('id')->on('return_transaction');
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
        Schema::dropIfExists('admin_return_transaction');
    }
}
