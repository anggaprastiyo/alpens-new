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
            $table->date('portfolio_date')->nullable();
            $table->string('tipe_asset')->nullable();
            $table->string('program')->nullable();
            $table->string('level_1')->nullable();
            $table->string('level_2')->nullable();
            $table->string('level_3')->nullable();
            $table->string('ticker')->nullable();
            $table->string('name')->nullable();
            $table->string('nama_bank')->nullable();
            $table->string('nomor_bilyet')->nullable();
            $table->string('nama_mi')->nullable();
            $table->string('rating')->nullable();
            $table->string('tanggal_perolehan')->nullable();
            $table->string('tanggal_maturity')->nullable();
            $table->float('nilai_nominal', 15, 2)->nullable()->nullable();
            $table->float('nilai_perolehan', 15, 2)->nullable();
            $table->float('harga_perolehan', 15, 2)->nullable();
            $table->float('kupon', 15, 2)->nullable();
            $table->integer('pembagian_kupon')->nullable();
            $table->float('bunga', 15, 2)->nullable();
            $table->string('pembagian_bunga')->nullable();
            $table->float('harga_pasar', 15, 2)->nullable();
            $table->float('nilai_pasar', 15, 2)->nullable();
            $table->decimal('nilai_tercatat', 15, 2)->nullable();
            $table->float('potential', 15, 2)->nullable();
            $table->integer('lembar_saham')->nullable();
            $table->float('deviden_saham', 15, 2)->nullable();
            $table->integer('pembagian_deviden_saham')->nullable();
            $table->decimal('market_cap_saham', 15, 2)->nullable();
            $table->string('type_reksadana')->nullable()->nullable();
            $table->float('unit_penyertaan', 15, 2)->nullable();
            $table->float('nab', 15, 2)->nullable();
            $table->integer('time_to_maturity')->nullable();
            $table->float('yield_to_maturity', 15, 2)->nullable();
            $table->float('faktor_pengurang', 15, 2)->nullable();
            $table->float('tenor', 15, 2)->nullable();
            $table->float('sisa_tenor', 15, 2)->nullable();
            $table->float('macaulay_duration', 15, 2)->nullable();
            $table->float('modified_duration', 15, 2)->nullable();
            $table->float('convexity_apporximation', 15, 2)->nullable();
            $table->float('bobot_macaulay_duration', 15, 2)->nullable();
            $table->float('bobot_modified_duration', 15, 2)->nullable();
            $table->float('bobot_convexity_apporximation', 15, 2)->nullable();
            $table->date('tanggal_saldo_awal')->nullable();
            $table->date('tanggal_add_set_modal')->nullable();
            $table->float('nilai_investasi', 15, 2)->nullable();
            $table->float('pelunasan_shl', 15, 2)->nullable();
            $table->float('tambahan_setoran_modal', 15, 2)->nullable();
            $table->float('div_yield_bunga', 15, 2)->nullable();
            $table->float('pembagian_div_yield_bunga', 15, 2)->nullable();
            $table->float('projected_add_yield', 15, 2)->nullable();
            $table->float('divestasi', 15, 2)->nullable();
            $table->date('tanggal_divestasi')->nullable();
            $table->float('harga_perolehan_divestasi', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
