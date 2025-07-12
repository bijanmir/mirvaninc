<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'meta_title',
        'meta_description',
        'author_name',
        'author_email',
        'category',
        'tags',
        'status',
        'published_at',
        'reading_time'
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'tags' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Boot the model and set up event listeners
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
            
            // Calculate reading time (average 200 words per minute)
            if ($post->content) {
                $wordCount = str_word_count(strip_tags($post->content));
                $post->reading_time = max(1, ceil($wordCount / 200));
            }
        });

        static::updating(function ($post) {
            if ($post->isDirty('title') && !$post->isDirty('slug')) {
                $post->slug = Str::slug($post->title);
            }
            
            if ($post->isDirty('content')) {
                $wordCount = str_word_count(strip_tags($post->content));
                $post->reading_time = max(1, ceil($wordCount / 200));
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
     * Scope for published posts
     */
    public function scopePublished(Builder $query)
    {
        return $query->where('status', 'published')
                    ->where('published_at', '<=', now());
    }

    /**
     * Scope for filtering by category
     */
    public function scopeByCategory(Builder $query, $category)
    {
        return $query->where('category', $category);
    }

    /**
     * Scope for filtering by tag
     */
    public function scopeByTag(Builder $query, $tag)
    {
        return $query->whereJsonContains('tags', $tag);
    }

    /**
     * Scope for recent posts
     */
    public function scopeRecent(Builder $query, $limit = 10)
    {
        return $query->orderBy('published_at', 'desc')->limit($limit);
    }

    /**
     * Get formatted published date
     */
    public function getFormattedDateAttribute()
    {
        return $this->published_at?->format('F j, Y') ?? $this->created_at->format('F j, Y');
    }

    /**
     * Get the excerpt or generate from content
     */
    public function getExcerptAttribute($value)
    {
        if ($value) {
            return $value;
        }

        // Generate excerpt from content if not provided
        $content = strip_tags($this->content);
        return Str::limit($content, 150);
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
     * Get all unique tags
     */
    public static function getAllTags()
    {
        return self::published()
                   ->whereNotNull('tags')
                   ->get()
                   ->pluck('tags')
                   ->flatten()
                   ->unique()
                   ->sort()
                   ->values();
    }
}