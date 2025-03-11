<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDataSapDetailsTable extends Migration
{
    public function up()
    {
        Schema::table('data_sap_details', function (Blueprint $table) {
            $table->unsignedBigInteger('data_sap_id')->nullable();
            $table->foreign('data_sap_id', 'data_sap_fk_10476536')->references('id')->on('data_saps');
        });
    }
}
