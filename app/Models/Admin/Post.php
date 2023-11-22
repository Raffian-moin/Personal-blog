<?php

namespace App\Models\Admin;

use App\Traits\Autofill;
use App\Models\Admin\Tag;
use App\Models\Admin\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use SoftDeletes, HasFactory, Autofill;

    protected $fillable = [
        'title',
        'slug',
        'created_by',
        'updated_by',
        'body',
        'category_id',
        'tag_id',
        'cover_image',
        'total_views',
        'unique_views',
        'is_published',
    ];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
