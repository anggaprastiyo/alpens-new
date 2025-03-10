<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataSapsTable extends Migration
{
    public function up()
    {
        Schema::create('data_saps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('report_date');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
