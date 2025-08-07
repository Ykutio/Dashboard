<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('description', 250)->nullable()->default(NULL);
            $table->string('img')->nullable()->default(NULL);
            $table->integer('price')->unsigned()->default(NULL);
            $table->integer('brand_id')->unsigned()->nullable()->default(NULL);
            $table->integer('cat_id')->unsigned()->nullable()->default(NULL);
            $table->integer('country_id')->unsigned()->nullable()->default(NULL);
            $table->integer('quantity')->unsigned()->nullable()->default(NULL);
            $table->string('status', 20);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
