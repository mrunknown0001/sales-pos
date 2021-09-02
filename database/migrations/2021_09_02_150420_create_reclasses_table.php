<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReclassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reclasses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reference_id')->nullable();
            $table->bigInteger('from_product_id')->nullable();
            $table->bigInteger('to_product_id')->nullable();
            $table->string('from_product')->nullable();
            $table->string('to_product')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('timestamp')->nullable();
            $table->bigInteger('reclass_by')->nullable();
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
        Schema::dropIfExists('reclasses');
    }
}
