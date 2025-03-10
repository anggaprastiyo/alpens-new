<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiayasTable extends Migration
{
    public function up()
    {
        Schema::create('biayas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
