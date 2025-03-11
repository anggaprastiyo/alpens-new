<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiabilityJkmsTable extends Migration
{
    public function up()
    {
        Schema::create('liability_jkms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('report_date');
            $table->string('skenario');
            $table->integer('tahun');
            $table->float('kps_jumlah_peserta_baru', 15, 2);
            $table->float('kps_jumlah_peserta_aktif', 15, 2);
            $table->float('iuran', 15, 2);
            $table->float('jumlah_kejadian', 15, 2);
            $table->float('pembayaran_manfaat', 15, 2);
            $table->float('cadangan_teknis', 15, 2);
            $table->float('cadangan_teknis_ibnr', 15, 2);
            $table->float('kenaikan_cadangan_teknis_ekdp', 15, 2);
            $table->float('kenaikan_cadangan_teknis_ibnr', 15, 2);
            $table->float('rasio_klaim', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
