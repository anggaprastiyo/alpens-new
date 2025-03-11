<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToYieldCurveDetailsTable extends Migration
{
    public function up()
    {
        Schema::table('yield_curve_details', function (Blueprint $table) {
            $table->unsignedBigInteger('yield_curve_id')->nullable();
            $table->foreign('yield_curve_id', 'yield_curve_fk_10470675')->references('id')->on('yield_curves');
        });
    }
}
