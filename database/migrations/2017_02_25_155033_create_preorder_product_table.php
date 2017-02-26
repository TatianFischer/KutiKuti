<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreorderProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preorder_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('preorder_id')->unsigned();
            $table->foreign('preorder_id')
                ->references('id')
                ->on('preorders')
                ->onDelete('no action')
                ->onUpdate('cascade');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('no action')
                ->onUpdate('cascade');
            $table->integer('quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('preorder_product', function(Blueprint $table){
            $table->dropForeign('preorder_product_product_id_foreign');
            $table->dropForeign('preorder_product_preorder_id_foreign');
        });

        Schema::drop('preorder_product');
    }
}
