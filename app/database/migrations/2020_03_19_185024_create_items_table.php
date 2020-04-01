<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('sku');
            $table->string('description');
            $table->unsignedInteger('quantity');
            $table->decimal('price', 10, 2);
            $table->decimal('line_total', 10, 2);
            $table->timestamps();
            
            $table->bigInteger('invoice_id')->unsigned();
            
            $table->foreign('invoice_id')
            ->references('id')
            ->on('invoices')
            ->onDelete('cascade')
            ->onUpdate('restrict');
            
            //$table->bigInteger('product_id')->unsigned();
            
            /* $table->foreign('product_id')
            ->references('id')
            ->on('products'); */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
