<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDepositosTable extends Migration
{
    public function up()
    {
        Schema::table('depositos', function (Blueprint $table) {
            $table->unsignedBigInteger('asset_migration_id')->nullable();
            $table->foreign('asset_migration_id', 'asset_migration_fk_10476032')->references('id')->on('asset_migrations');
        });
    }
}
