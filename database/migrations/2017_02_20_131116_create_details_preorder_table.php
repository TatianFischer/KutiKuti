<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsPreorderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_preorder', function (Blueprint $table) {
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
        Schema::dropIfExists('details_preorder');
    }
}
