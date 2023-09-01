<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'status',
        'created_by'
    ];

    public function createSlug($name) {
        $id = Tag::latest('id')->first()->id ?? 0;
        return Str::slug($name, '-') . '-'. $id+1;
    }

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'boolean',
    ];
}
