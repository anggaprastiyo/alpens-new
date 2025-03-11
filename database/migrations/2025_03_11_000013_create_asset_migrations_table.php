<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetMigrationsTable extends Migration
{
    public function up()
    {
        Schema::create('asset_migrations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('portofolio_date');
            $table->integer('jumlah_tahun');
            $table->string('name');
            $table->string('type')->nullable();
            $table->string('version');
            $table->longText('compare_laporan_keuangan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
