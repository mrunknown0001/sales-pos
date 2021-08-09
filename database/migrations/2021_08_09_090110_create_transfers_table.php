<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('location_id')->nullable();
            $table->bigInteger('product_id')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('reference_id')->nullable();
            $table->date('date')->nullable();
            $table->string('time', 10)->nullable();
            $table->string('remarks')->nullable();
            $table->string('delivered_by', 150)->nullable();
            $table->string('attachment')->nullable();
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
        Schema::dropIfExists('transfers');
    }
}
