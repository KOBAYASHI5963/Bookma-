<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /*
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->comment('外部キー');
            $table->foreignId('category_id')->constrained()->comment('外部キー');
            $table->foreignId('product_condition')->constrained()->comment('外部キー');
            $table->foreignId('shipping_method_id')->constrained()->comment('外部キー');
            $table->string('title', 50)->comment('本のタイトル');
            $table->text('content',500)->nullable()->comment('本の内容文');
            $table->integer('shipping_bearer')->comment('配送料負担者（1.出品者,2.購入者）');
            $table->string('shipping_area')->comment('発送場所');
            $table->string('delivery_days')->comment('発送日数');
            $table->integer('price')->comment('本の値段');
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
        Schema::dropIfExists('books');
    }
}
