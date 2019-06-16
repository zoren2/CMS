<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use SoftDeletes;

    // Treat this field as a date
    protected $dates = [
        'published_at'
    ];

    protected $fillable = [
        'title', 'description', 'content', 'image', 'published_at', 'category_id', 'user_id'
    ];

    /**
     * Delete post image from storage.
     *
     * @return void
     */
    public function deleteImage()
    {
        Storage::disk('public')->delete($this->image);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Helper function used to check if post has tags
     *
     * @param $tagId
     * @return bool
     */
    public function hasTag($tagId)
    {
        return in_array($tagId, $this->tags->pluck('id')->toArray());
    }


    /*
     * Scope name must be camel cased. This function gets an instance of a query.
     * Then you can call searched() to filter results.
     */
    public function scopeSearched($query)
    {
        $search = request()->query('search');

        // If user is not searching then simply return the query.
        if (!$search) {
            return $query;
        }

        // Returns the query which can be then chained if needed
        return $query->where('title', 'LIKE', "%{$search}%");
    }

    public function scopePublished($query)
    {

        return $query->where('published_at', '<=', now()); // Helper function returns current time
    }

}
