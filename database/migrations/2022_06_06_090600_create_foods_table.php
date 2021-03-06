<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('category_id')->constrained();
            $table->string('description')->nullable()->default(null);
            $table->string('image')->nullable()->default(null);
            $table->unsignedInteger('regular_price')->nullable()->default(null);
            $table->unsignedInteger('sale_price')->nullable()->default(null);
            $table->unsignedTinyInteger('stock')->default(0);
            $table->unsignedTinyInteger('preparation_time')->default(20);
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
        Schema::dropIfExists('food');
    }
}
