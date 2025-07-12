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
        Schema::create('contact_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->enum('service', [
                'applications',
                'websites', 
                'marketing',
                'transformation',
                'multiple'
            ]);
            $table->enum('budget', [
                '5k-10k',
                '10k-25k',
                '25k-50k',
                '50k-100k',
                '100k+'
            ]);
            $table->text('message');
            $table->enum('status', ['new', 'contacted', 'qualified', 'proposal_sent', 'closed_won', 'closed_lost'])
                  ->default('new');
            $table->text('notes')->nullable();
            $table->timestamp('contacted_at')->nullable();
            $table->timestamps();

            // Indexes for better performance
            $table->index(['status', 'created_at']);
            $table->index('email');
            $table->index('service');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_submissions');
    }
};