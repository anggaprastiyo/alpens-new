<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInvestasiLangsungsTable extends Migration
{
    public function up()
    {
        Schema::table('investasi_langsungs', function (Blueprint $table) {
            $table->unsignedBigInteger('asset_migration_id')->nullable();
            $table->foreign('asset_migration_id', 'asset_migration_fk_10476130')->references('id')->on('asset_migrations');
        });
    }
}
