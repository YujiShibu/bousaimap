<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('needs', function (Blueprint $table) {
        $table->id();
        $table->text('content');               // 心配や困り事
        $table->string('name');       // 対象家庭
        $table->string('reporter')->nullable();   // 報告者名（任意）
        $table->string('phone')->nullable();  // 報告者電話番号（任意）
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('needs');
    }
};
