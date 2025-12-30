<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('hazards', function (Blueprint $table) {
            $table->boolean('resolved')->default(false)->after('description');
        });
    }

    public function down()
    {
        Schema::table('hazards', function (Blueprint $table) {
            $table->dropColumn('resolved');
        });
    }
};
