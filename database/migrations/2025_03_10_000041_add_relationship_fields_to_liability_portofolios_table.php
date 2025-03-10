<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLiabilityPortofoliosTable extends Migration
{
    public function up()
    {
        Schema::table('liability_portofolios', function (Blueprint $table) {
            $table->unsignedBigInteger('biaya_id')->nullable();
            $table->foreign('biaya_id', 'biaya_fk_10476288')->references('id')->on('biayas');
            $table->unsignedBigInteger('yield_curve_id')->nullable();
            $table->foreign('yield_curve_id', 'yield_curve_fk_10476289')->references('id')->on('yield_curves');
        });
    }
}
