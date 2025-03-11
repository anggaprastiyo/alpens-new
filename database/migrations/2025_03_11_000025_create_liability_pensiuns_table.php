<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiabilityPensiunsTable extends Migration
{
    public function up()
    {
        Schema::create('liability_pensiuns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('report_date');
            $table->string('skenario');
            $table->integer('tahun');
            $table->float('peserta_pensiun', 15, 2);
            $table->float('iuran', 15, 2);
            $table->float('spppip', 15, 2);
            $table->float('pembayaran_manfaat', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
