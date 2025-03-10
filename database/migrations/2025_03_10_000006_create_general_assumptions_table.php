<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralAssumptionsTable extends Migration
{
    public function up()
    {
        Schema::create('general_assumptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('version_name');
            $table->integer('tahun_awal_proyeksi');
            $table->integer('tahun_akhir_proyeksi');
            $table->float('pajak_atas_kupon_obligasi', 5, 2);
            $table->float('pajak_atas_bunga_deposito', 5, 2);
            $table->float('kenaikan_bop_pertahun', 5, 2);
            $table->float('spread_yoi_untuk_si', 5, 2);
            $table->float('counter_rate', 5, 2);
            $table->float('spread_counter_rate', 5, 2);
            $table->float('tenor_saham', 5, 2);
            $table->float('tenor_reksadana', 5, 2);
            $table->float('tenor_inv_langsung', 5, 2);
            $table->float('capital_gain_saham', 5, 2);
            $table->float('capital_gain_reksadana', 5, 2);
            $table->float('capital_gain_inv_langsung', 5, 2);
            $table->float('capital_gain_rdpt', 5, 2);
            $table->decimal('market_cap_saham', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
