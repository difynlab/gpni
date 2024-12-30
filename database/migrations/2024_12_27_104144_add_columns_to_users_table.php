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
            $table->enum('is_asnc', [1, 2])->nullable()->after('is_cissn');
            $table->enum('cec_status', [1, 2])->nullable()->index()->after('is_asnc');
            $table->text('credentials')->nullable()->after('cec_status');
            $table->string('certificate_number')->nullable()->after('credentials');
            $table->enum('membership_credential_status', [1, 2])->nullable()->after('certificate_number');
            $table->enum('is_qualified', [1, 2])->nullable()->after('membership_credential_status');
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
                'is_asnc',
                'cec_status',
                'credentials',
                'certificate_number',
                'membership_credential_status',
                'is_qualified'
            ]);
        });
    }
};
