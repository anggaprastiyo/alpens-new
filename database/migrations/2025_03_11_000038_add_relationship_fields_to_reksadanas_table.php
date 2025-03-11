<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToReksadanasTable extends Migration
{
    public function up()
    {
        Schema::table('reksadanas', function (Blueprint $table) {
            $table->unsignedBigInteger('asset_migration_id')->nullable();
            $table->foreign('asset_migration_id', 'asset_migration_fk_10476070')->references('id')->on('asset_migrations');
        });
    }
}
