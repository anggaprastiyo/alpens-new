<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBopDetailsTable extends Migration
{
    public function up()
    {
        Schema::table('bop_details', function (Blueprint $table) {
            $table->unsignedBigInteger('bop_id')->nullable();
            $table->foreign('bop_id', 'bop_fk_10475961')->references('id')->on('bops');
        });
    }
}
