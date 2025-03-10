<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceHistoricalsTable extends Migration
{
    public function up()
    {
        Schema::create('price_historicals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ticker');
            $table->string('nama');
            $table->date('tanggal');
            $table->string('isin');
            $table->string('rating');
            $table->float('fair_yield', 5, 2);
            $table->float('fair_price', 5, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
