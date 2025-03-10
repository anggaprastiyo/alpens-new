<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetAdjustmentsTable extends Migration
{
    public function up()
    {
        Schema::create('asset_adjustments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('portfolio_date');
            $table->string('tipe_asset');
            $table->string('program');
            $table->string('level_1');
            $table->string('level_2');
            $table->string('level_3');
            $table->string('ticker');
            $table->string('name');
            $table->string('nama_bank');
            $table->string('nomor_bilyet');
            $table->string('nama_mi');
            $table->string('rating');
            $table->string('tanggal_perolehan');
            $table->string('tanggal_maturity');
            $table->float('nilai_nominal', 15, 2)->nullable();
            $table->float('nilai_perolehan', 15, 2);
            $table->float('harga_perolehan', 15, 2);
            $table->float('kupon', 15, 2);
            $table->integer('pembagian_kupon');
            $table->float('bunga', 15, 2);
            $table->string('pembagian_bunga');
            $table->float('harga_pasar', 15, 2);
            $table->float('nilai_pasar', 15, 2);
            $table->decimal('nilai_tercatat', 15, 2);
            $table->float('potential', 15, 2);
            $table->integer('lembar_saham');
            $table->float('deviden_saham', 15, 2);
            $table->integer('pembagian_deviden_saham');
            $table->decimal('market_cap_saham', 15, 2);
            $table->string('type_reksadana')->nullable();
            $table->float('unit_penyertaan', 15, 2);
            $table->float('nab', 15, 2);
            $table->integer('time_to_maturity');
            $table->float('yield_to_maturity', 15, 2);
            $table->float('faktor_pengurang', 15, 2);
            $table->float('tenor', 15, 2);
            $table->float('sisa_tenor', 15, 2);
            $table->float('macaulay_duration', 15, 2);
            $table->float('modified_duration', 15, 2);
            $table->float('convexity_apporximation', 15, 2);
            $table->float('bobot_macaulay_duration', 15, 2);
            $table->float('bobot_modified_duration', 15, 2);
            $table->float('bobot_convexity_apporximation', 15, 2);
            $table->date('tanggal_saldo_awal');
            $table->date('tanggal_add_set_modal');
            $table->float('nilai_investasi', 15, 2);
            $table->float('pelunasan_shl', 15, 2);
            $table->float('tambahan_setoran_modal', 15, 2);
            $table->float('div_yield_bunga', 15, 2);
            $table->float('pembagian_div_yield_bunga', 15, 2);
            $table->float('projected_add_yield', 15, 2);
            $table->float('divestasi', 15, 2);
            $table->date('tanggal_divestasi');
            $table->float('harga_perolehan_divestasi', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
