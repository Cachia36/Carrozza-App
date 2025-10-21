<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Run outside a single transaction (helps with Postgres on some hosts)
    public $withinTransaction = false;

    public function up(): void
    {
        // 1) Create table without FK
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->string('year'); // you can switch to ->integer('year') later if you prefer
            $table->string('salesperson_email');
            $table->unsignedBigInteger('manufacturer_id'); // index/constraint added below
            $table->timestamps();
        });

        // 2) Add FK in a separate statement
        Schema::table('cars', function (Blueprint $table) {
            $table->foreign('manufacturer_id', 'cars_manufacturer_id_foreign')
                  ->references('id')->on('manufacturers')
                  ->cascadeOnDelete(); // optional but nice to have
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
