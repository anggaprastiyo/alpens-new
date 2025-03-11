<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSahamsTable extends Migration
{
    public function up()
    {
        Schema::table('sahams', function (Blueprint $table) {
            $table->unsignedBigInteger('asset_migration_id')->nullable();
            $table->foreign('asset_migration_id', 'asset_migration_fk_10476003')->references('id')->on('asset_migrations');
        });
    }
}
