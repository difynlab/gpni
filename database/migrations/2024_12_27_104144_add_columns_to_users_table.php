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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('is_certified', [1, 2])->nullable()->after('self_introduction');
            $table->enum('is_sns', [1, 2])->nullable()->after('is_certified');
            $table->enum('is_snc', [1, 2])->nullable()->after('is_sns');
            $table->enum('is_cissn', [1, 2])->nullable()->after('is_snc');
            $table->enum('is_pne', [1, 2])->nullable()->after('is_cissn');
            $table->enum('cec_status', [1, 2])->nullable()->index()->after('is_pne');
            $table->string('certificate_number')->nullable()->after('cec_status');
            $table->enum('membership_credential_status', [1, 2])->nullable()->after('certificate_number');
            $table->enum('is_qualified', [1, 2])->nullable()->after('membership_credential_status');
            $table->enum('is_new', [0, 1])->default('1')->after('is_qualified');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'is_certified',
                'is_sns',
                'is_snc',
                'is_cissn',
                'is_pne',
                'cec_status',
                'certificate_number',
                'membership_credential_status',
                'is_qualified'
            ]);
        });
    }
};
