<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('hazards', function (Blueprint $table) {
            $table->string('reporter')->nullable()->after('description'); // 報告者
            $table->string('phone')->nullable()->after('reporter');       // 電話番号
        });
    }

    public function down(): void
    {
        Schema::table('hazards', function (Blueprint $table) {
            $table->dropColumn(['reporter', 'phone']);
        });
    }
};
