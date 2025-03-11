<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAssetMigrationsTable extends Migration
{
    public function up()
    {
        Schema::table('asset_migrations', function (Blueprint $table) {
            $table->unsignedBigInteger('yield_curve_id')->nullable();
            $table->foreign('yield_curve_id', 'yield_curve_fk_10475881')->references('id')->on('yield_curves');
        });
    }
}
