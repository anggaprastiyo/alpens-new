<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSahamsTable extends Migration
{
    public function up()
    {
        Schema::create('sahams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('program');
            $table->string('level_1')->nullable();
            $table->string('level_2')->nullable();
            $table->string('level_3')->nullable();
            $table->string('ticker');
            $table->string('name');
            $table->float('nilai_perolehan', 15, 2)->nullable();
            $table->float('harga_perolehan', 15, 2)->nullable();
            $table->float('harga_pasar', 15, 2)->nullable();
            $table->float('nilai_pasar', 15, 2)->nullable();
            $table->integer('lembar_saham')->nullable();
            $table->float('deviden_saham', 15, 2)->nullable();
            $table->integer('pembagian_deviden_saham')->nullable();
            $table->decimal('market_cap_saham', 15, 2)->nullable();
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
