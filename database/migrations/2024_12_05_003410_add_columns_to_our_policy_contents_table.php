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
        Schema::table('our_policy_contents', function (Blueprint $table) {
            $table->text('page_name_en')->nullable()->after('id');
            $table->text('page_name_zh')->nullable()->after('page_name_en');
            $table->text('page_name_ja')->nullable()->after('page_name_zh');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('our_policy_contents', function (Blueprint $table) {
            $table->dropColumn(['page_name_en', 'page_name_zh', 'page_name_ja']);
        });
    }
};
