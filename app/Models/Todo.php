<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Support\Facades\Auth;


class Todo extends Model
{
    /** @use HasFactory<\Database\Factories\TodoFactory> */
    use HasFactory,HasUuids,HasSlug;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['title', 'slug', 'description','is_completed'];

    protected $casts = [
        'is_completed' => 'boolean',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    public function user()
{
    return $this->belongsTo(User::class);
}

protected static function booted()
{
    static::creating(function ($todo) {
        if (Auth::check()) {
            $todo->user_id = Auth::id();
        }
    });
}

}
