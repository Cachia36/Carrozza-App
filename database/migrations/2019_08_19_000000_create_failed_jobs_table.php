<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Run outside a single transaction
    public $withinTransaction = false;

    public function up(): void
    {
        // 1. Create without the unique constraint
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid'); // no ->unique() here
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });

        // 2. Apply the unique constraint separately
        Schema::table('failed_jobs', function (Blueprint $table) {
            $table->unique('uuid', 'failed_jobs_uuid_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('failed_jobs');
    }
};
