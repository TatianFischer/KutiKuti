<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarouselsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carousels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('picture');
            $table->string('alternative');
            $table->text('text')->nullable();
            $table->enum('position_vertical',[NULL, 'top', 'middle', 'bottom'])->nullable();
            $table->enum('position_horizontal', [NULL, 'left', 'center', 'right'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carousels');
    }
}
