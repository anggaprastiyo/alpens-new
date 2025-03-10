<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiayaDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('biaya_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('program')->nullable();
            $table->decimal('iuran', 15, 2)->nullable();
            $table->decimal('bop', 15, 2)->nullable();
            $table->decimal('biaya_operasional', 15, 2);
            $table->decimal('rkap_iuran', 15, 2);
            $table->decimal('rkap_bop', 15, 2);
            $table->decimal('rkap_biaya_operasional', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
