<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYieldCurveDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('yield_curve_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal');
            $table->float('tenor_year', 5, 2)->nullable();
            $table->float('today', 5, 2);
            $table->float('change_bps', 5, 2);
            $table->float('yesterday_yield', 5, 2);
            $table->float('lastweek_yield', 5, 2);
            $table->float('lastmonth_yield', 5, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
