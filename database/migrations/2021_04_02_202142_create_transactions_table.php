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
            $table->id();
            $table->string('recipientName');
            $table->string('telNo');
            $table->string('recipientDetails')->nullable();
            $table->string('itemName');
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('color')->nullable();
            $table->integer('quantity');
            $table->float('selling_price');
            $table->float('profit');
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
