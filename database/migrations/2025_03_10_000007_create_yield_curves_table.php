<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYieldCurvesTable extends Migration
{
    public function up()
    {
        Schema::create('yield_curves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('version_name');
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
