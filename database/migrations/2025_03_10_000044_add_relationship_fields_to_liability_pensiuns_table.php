<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLiabilityPensiunsTable extends Migration
{
    public function up()
    {
        Schema::table('liability_pensiuns', function (Blueprint $table) {
            $table->unsignedBigInteger('liability_portofolio_id')->nullable();
            $table->foreign('liability_portofolio_id', 'liability_portofolio_fk_10476432')->references('id')->on('liability_portofolios');
        });
    }
}
