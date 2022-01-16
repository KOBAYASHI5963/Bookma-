<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferAccountSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_account_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->comment('外部キー');
            $table->string('bank_name')->comment('銀行名');
            $table->integer('bank_code')->comment('銀行コード');
            $table->string('branch_name')->comment('支店名');
            $table->integer('branch_code')->comment('支店コード');
            $table->string('deposit_type')->comment('預金種別');
            $table->integer('account_number')->comment('口座番号');
            $table->string('account_name')->comment('口座名義');
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
        Schema::dropIfExists('transfer_account_settings');
    }
}
