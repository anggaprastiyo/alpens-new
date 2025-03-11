<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestasiLangsungsTable extends Migration
{
    public function up()
    {
        Schema::create('investasi_langsungs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('program');
            $table->string('level_1')->nullable();
            $table->string('level_2')->nullable();
            $table->string('level_3')->nullable();
            $table->string('name');
            $table->float('nilai_pasar', 15, 2)->nullable();
            $table->decimal('market_cap_saham', 15, 2)->nullable();
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
            $table->float('modified_duration', 15, 2)->nullable();
            $table->float('macaulay_duration', 15, 2)->nullable();
            $table->string('last_edited_by')->nullable();
            $table->boolean('is_updated')->default(0)->nullable();
            $table->boolean('is_new')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
