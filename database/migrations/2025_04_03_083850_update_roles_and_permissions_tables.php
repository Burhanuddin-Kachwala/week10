<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        

        Schema::table('permissions', function (Blueprint $table) {
            $table->string('slug')->unique()->after('name'); // Add slug column
        });
    }

    public function down()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->renameColumn('name', 'role_name'); // Revert column name change
            $table->dropColumn('slug'); // Remove slug column
        });

        Schema::table('permissions', function (Blueprint $table) {
            $table->dropColumn('slug'); // Remove slug column
        });
    }
};
