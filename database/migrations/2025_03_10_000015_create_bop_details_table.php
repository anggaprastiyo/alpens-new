<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBopDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('bop_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tahun');
            $table->decimal('nilai_bop', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
