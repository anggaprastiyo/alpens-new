<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBiayaDetailsTable extends Migration
{
    public function up()
    {
        Schema::table('biaya_details', function (Blueprint $table) {
            $table->unsignedBigInteger('biaya_id')->nullable();
            $table->foreign('biaya_id', 'biaya_fk_10470714')->references('id')->on('biayas');
        });
    }
}
