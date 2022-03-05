<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateShippingAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->comment('外部キー');
            $table->string('name', 50)->comment('氏名');
            $table->integer('post_code')->comment('郵便番号');
            $table->string('prefectures')->comment('都道府県 ex.東京都');
            $table->string('city')->comment('市区町村 ex.港区');
            $table->string('street')->comment('番地 ex.青山1-2-3');
            $table->string('building_name')->nullable($value = true)->comment('建物名(任意) ex.レブロンハイツ325');
            $table->unsignedBigInteger('phone_number')->comment('電話番号');
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
        Schema::dropIfExists('shipping_addresses');
    }
}
