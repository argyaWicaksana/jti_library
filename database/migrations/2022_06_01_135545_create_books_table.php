<?php

use App\Models\Publisher;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book', function (Blueprint $table) {
            $table->id('id');
            $table->string('title');
            $table->string('photo')->nullable();
            $table->date('year');
            $table->string('status');
            $table->integer('stock');
            $table->string('author');
            $table->string('isbn_issn');
            $table->unsignedBigInteger('type_id')->nullable();
            $table->foreign('type_id')->references('id')->on('type')->nullOnDelete();
            $table->unsignedBigInteger('publisher_id')->nullable();
            $table->foreign('publisher_id')->references('id')->on('publisher')->nullOnDelete();
            $table->string('description');
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
        Schema::dropIfExists('book');
    }
}
