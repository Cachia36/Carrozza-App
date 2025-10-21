<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Important for Postgres on some hosts: run this migration outside a transaction
    public $withinTransaction = false; // note: no type hint

    public function up(): void
    {
        // 1) Create the table WITHOUT the PK first
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->nullable(false); // required
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // 2) Add the primary key in a separate statement
        Schema::table('password_reset_tokens', function (Blueprint $table) {
            $table->primary('email', 'password_reset_tokens_email_primary');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('password_reset_tokens');
    }
};
