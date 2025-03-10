<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiabilityThtsTable extends Migration
{
    public function up()
    {
        Schema::create('liability_thts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('report_date');
            $table->string('skenario');
            $table->integer('tahun');
            $table->float('kps_jumlah_pns_baru', 15, 2);
            $table->float('kps_jumlah_peserta_aktif', 15, 2);
            $table->float('pensiun_iuran', 15, 2);
            $table->float('pensiun_manfaat', 15, 2);
            $table->float('tht_iuran_tht', 15, 2);
            $table->float('tht_iuran_si', 15, 2);
            $table->float('dwiguna_jumlah_klaim_pensiun', 15, 2);
            $table->float('dwiguna_jumlah_klaim_meninggal', 15, 2);
            $table->float('dwiguna_jumlah_klaim_keluar', 15, 2);
            $table->float('dwiguna_jumlah_pembayaran_pensiun', 15, 2);
            $table->float('dwiguna_jumlah_pembayaran_meninggal', 15, 2);
            $table->float('dwiguna_jumlah_pembayaran_keluar', 15, 2);
            $table->float('dwiguna_si_hp_pensiun', 15, 2);
            $table->float('dwiguna_si_hp_meninggal', 15, 2);
            $table->float('dwiguna_si_hp_keluar', 15, 2);
            $table->float('askem_aktif_jumlah_klaim_pensiun', 15, 2);
            $table->float('askem_aktif_jumlah_klaim_meninggal', 15, 2)->nullable();
            $table->float('askem_aktif_jumlah_klaim_keluar', 15, 2);
            $table->float('askem_aktif_jumlah_pembayaran_pensiun', 15, 2);
            $table->float('askem_aktif_jumlah_pembayaran_meninggal', 15, 2);
            $table->float('askem_aktif_jumlah_pembayaran_keluar', 15, 2);
            $table->float('askem_pensiun_jumlah_klaim_pensiun', 15, 2);
            $table->float('askem_pensiun_jumlah_klaim_meninggal', 15, 2);
            $table->float('askem_pensiun_jumlah_klaim_keluar', 15, 2);
            $table->float('askem_pensiun_jumlah_pembayaran_pensiun', 15, 2);
            $table->float('askem_pensiun_jumlah_pembayaran_meninggal', 15, 2);
            $table->float('askem_pensiun_jumlah_pembayaran_keluar', 15, 2);
            $table->float('total_manfaat', 15, 2);
            $table->float('kmpmd_asuransi_dwiguna', 15, 2)->nullable();
            $table->float('kmpmd_asuransi_kematian', 15, 2);
            $table->float('kenaikan_kmpmd', 15, 2);
            $table->float('liabilitas', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
