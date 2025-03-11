<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataSapDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('data_sap_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jenis_program');
            $table->string('item');
            $table->decimal('nominal', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
