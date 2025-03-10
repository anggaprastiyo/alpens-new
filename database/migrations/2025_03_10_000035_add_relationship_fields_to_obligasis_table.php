<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToObligasisTable extends Migration
{
    public function up()
    {
        Schema::table('obligasis', function (Blueprint $table) {
            $table->unsignedBigInteger('asset_migration_id')->nullable();
            $table->foreign('asset_migration_id', 'asset_migration_fk_10475968')->references('id')->on('asset_migrations');
        });
    }
}
