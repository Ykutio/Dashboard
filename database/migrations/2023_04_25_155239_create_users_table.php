<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments( 'id' );
            $table->string('name', 20);
            $table->string('surname', 50);
            $table->string('email', 50)->unique();;
            $table->string('adress', 60)->nullable();
            $table->string('telephone', 20)->nullable();
            $table->string('card_bank', 50)->nullable();
            $table->string('card_number', 50)->nullable();
            $table->string( 'image' )->nullable();
            $table->string('password', 60);
            $table->string('_token', 255);
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
        Schema::dropIfExists('users');
    }
}
