<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // run outside a single transaction for Postgres reliability
    public $withinTransaction = false;

    public function up(): void
    {
        // 1) Create table WITHOUT indexes/unique
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();

            // Instead of $table->morphs('tokenable'); (which auto-adds an index),
            // define the two columns explicitly, no index yet.
            $table->string('tokenable_type');
            $table->unsignedBigInteger('tokenable_id');

            $table->string('name');
            $table->string('token', 64); // no ->unique() yet
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });

        // 2) Add indexes/unique in separate statements
        Schema::table('personal_access_tokens', function (Blueprint $table) {
            // composite index for the morph
            $table->index(
                ['tokenable_type', 'tokenable_id'],
                'personal_access_tokens_tokenable_type_tokenable_id_index'
            );

            // unique on token
            $table->unique('token', 'personal_access_tokens_token_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};
