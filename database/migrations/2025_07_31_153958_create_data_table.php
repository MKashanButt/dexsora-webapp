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
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->string('ip')
                ->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->text('comment')
                ->nullable();
            $table->string('address')
                ->nullable();
            $table->string('document')
                ->nullable();
            $table->string('pod')
                ->nullable();
            $table->enum('status', [
                'inquiries',
                'awaiting-prescriptions',
                'shipments',
                'billed-by-insurance',
                'paid-by-insurance',
                'denials'
            ]);
            $table->foreignId('user_id')
                ->constrained("users")
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
