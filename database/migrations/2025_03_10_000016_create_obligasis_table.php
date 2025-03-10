<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObligasisTable extends Migration
{
    public function up()
    {
        Schema::create('obligasis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('program');
            $table->string('level_1')->nullable();
            $table->string('level_2')->nullable();
            $table->string('level_3')->nullable();
            $table->string('ticker');
            $table->string('name');
            $table->string('rating')->nullable();
            $table->date('tanggal_perolehan')->nullable();
            $table->date('tanggal_maturity')->nullable();
            $table->float('nilai_nominal', 15, 2)->nullable();
            $table->float('nilai_perolehan', 15, 2)->nullable();
            $table->float('harga_perolehan', 15, 2)->nullable();
            $table->float('kupon', 15, 2)->nullable();
            $table->float('pembagian_kupon', 15, 2)->nullable();
            $table->float('harga_pasar', 15, 2)->nullable();
            $table->float('nilai_pasar', 15, 2)->nullable();
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
            $table->string('last_edited_by')->nullable();
            $table->boolean('is_updated')->default(0)->nullable();
            $table->boolean('is_new')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
