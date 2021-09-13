<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConvertionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convertions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reference_number');
            $table->bigInteger('product_from_id');
            $table->bigInteger('product_to_id');
            $table->string('product_from');
            $table->string('product_to');
            $table->bigInteger('uom_from_id');
            $table->bigInteger('uom_to_id');
            $table->string('uom_from');
            $table->string('uom_to');
            $table->integer('quantity_from');
            $table->integer('quantity_to');
            $table->string('multiplier')->nullable();
            $table->string('divisor')->nullable();
            $table->date('date')->nullable();
            $table->bigInteger('converted_by')->nullable();
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
        Schema::dropIfExists('convertions');
    }
}
