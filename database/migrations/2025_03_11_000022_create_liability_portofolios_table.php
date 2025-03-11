<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiabilityPortofoliosTable extends Migration
{
    public function up()
    {
        Schema::create('liability_portofolios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->date('date');
            $table->float('modified_duration_tht', 15, 2)->nullable();
            $table->float('macaulay_duration_tht', 15, 2)->nullable();
            $table->float('modified_duration_aip', 15, 2)->nullable();
            $table->float('macaulay_duration_aip', 15, 2)->nullable();
            $table->float('modified_duration_jkk', 15, 2)->nullable();
            $table->float('macaulay_duration_jkk', 15, 2)->nullable();
            $table->float('modified_duration_jkm', 15, 2)->nullable();
            $table->float('macaulay_duration_jkm', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
