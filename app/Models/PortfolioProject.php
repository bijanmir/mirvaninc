<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class PortfolioProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'client_name',
        'client_industry',
        'project_url',
        'featured_image',
        'gallery_images',
        'category',
        'tags',
        'technologies',
        'duration',
        'team_size',
        'budget_range',
        'results',
        'testimonial',
        'status',
        'featured',
        'completed_at',
        'sort_order'
    ];

    protected $casts = [
        'gallery_images' => 'array',
        'tags' => 'array',
        'technologies' => 'array',
        'results' => 'array',
        'testimonial' => 'array',
        'featured' => 'boolean',
        'completed_at' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Boot the model
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });

        static::updating(function ($project) {
            if ($project->isDirty('title') && !$project->isDirty('slug')) {
                $project->slug = Str::slug($project->title);
            }
        });
    }

    /**
     * Get the route key for the model
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Scope for published projects
     */
    public function scopePublished(Builder $query)
    {
        return $query->where('status', 'published');
    }

    /**
     * Scope for featured projects
     */
    public function scopeFeatured(Builder $query)
    {
        return $query->where('featured', true);
    }

    /**
     * Scope for filtering by category
     */
    public function scopeByCategory(Builder $query, $category)
    {
        return $query->where('category', $category);
    }

    /**
     * Scope for filtering by technology
     */
    public function scopeByTechnology(Builder $query, $technology)
    {
        return $query->whereJsonContains('technologies', $technology);
    }

    /**
     * Scope for ordering by sort order
     */
    public function scopeOrdered(Builder $query)
    {
        return $query->orderBy('sort_order', 'asc')
                    ->orderBy('completed_at', 'desc')
                    ->orderBy('created_at', 'desc');
    }

    /**
     * Get formatted duration
     */
    public function getFormattedDurationAttribute()
    {
        if (!$this->duration) {
            return null;
        }

        // If duration is in months
        if ($this->duration <= 12) {
            return $this->duration . ' month' . ($this->duration > 1 ? 's' : '');
        }

        // If duration is in weeks (convert from months)
        $weeks = $this->duration * 4;
        return $weeks . ' week' . ($weeks > 1 ? 's' : '');
    }

    /**
     * Get the primary image (featured or first gallery image)
     */
    public function getPrimaryImageAttribute()
    {
        if ($this->featured_image) {
            return $this->featured_image;
        }

        if ($this->gallery_images && count($this->gallery_images) > 0) {
            return $this->gallery_images[0];
        }

        return null;
    }

    /**
     * Get formatted client display name
     */
    public function getClientDisplayNameAttribute()
    {
        if ($this->client_name === 'NDA' || $this->client_name === 'Confidential') {
            return 'Confidential Client';
        }

        return $this->client_name;
    }

    /**
     * Get unique categories
     */
    public static function getCategories()
    {
        return self::published()
                   ->distinct('category')
                   ->whereNotNull('category')
                   ->pluck('category')
                   ->sort()
                   ->values();
    }

    /**
     * Get all technologies used
     */
    public static function getAllTechnologies()
    {
        return self::published()
                   ->whereNotNull('technologies')
                   ->get()
                   ->pluck('technologies')
                   ->flatten()
                   ->unique()
                   ->sort()
                   ->values();
    }
}