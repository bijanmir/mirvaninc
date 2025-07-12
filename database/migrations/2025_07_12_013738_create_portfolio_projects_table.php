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
        Schema::create('portfolio_projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->longText('content')->nullable();
            $table->string('client_name');
            $table->string('client_industry')->nullable();
            $table->string('project_url')->nullable();
            $table->string('featured_image')->nullable();
            $table->json('gallery_images')->nullable();
            $table->enum('category', ['applications', 'websites', 'marketing', 'transformation']);
            $table->json('tags')->nullable();
            $table->json('technologies')->nullable();
            $table->string('duration')->nullable(); // e.g., "6 months", "3 weeks"
            $table->integer('team_size')->nullable();
            $table->string('budget_range')->nullable(); // e.g., "50k-100k"
            $table->json('results')->nullable(); // Key metrics/achievements
            $table->json('testimonial')->nullable(); // Client testimonial with author info
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->boolean('featured')->default(false);
            $table->date('completed_at')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            // Indexes for better performance
            $table->index(['status', 'featured']);
            $table->index('category');
            $table->index('slug');
            $table->index(['sort_order', 'completed_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_projects');
    }
};