<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeaponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weapons', function (Blueprint $table) {
            $table->increments( 'id' );
            $table->string('name', 32);
            $table->integer('type_id')->nullable();
            $table->text('description')->nullable();
            $table->text('tacktical_descr')->nullable();
            $table->integer('price')->default(0);
            $table->integer('country_id')->nullable();
            $table->string('image', 255)->nullable();
            $table->tinyInteger('status')->default(0);
            $table->integer('views')->default(0);
            $table->integer('quantity')->default(0);
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
        Schema::dropIfExists('weapons');
    }
}
