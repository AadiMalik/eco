<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masters', function (Blueprint $table) {
            $table->id();
            $table->string('invoice');
            $table->integer('total');
            $table->integer('sub_total');
            $table->integer('discount');
            $table->integer('qty');
            $table->integer('address');
            $table->integer('status')->default('2');
            $table->integer('process')->default('3');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('method_id')->unsigned()->nullable();
            $table->foreign('method_id')->references('id')->on('transaction_types');
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
        Schema::dropIfExists('masters');
    }
}
