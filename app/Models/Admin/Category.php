<?php

namespace App\Models\Admin;

use App\Traits\Autofill;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use SoftDeletes, HasFactory, Autofill;

    protected $fillable = [
        'name',
        'slug',
        'status',
        'created_by',
        'updated_by'
    ];

    public function createSlug($name, $id)
    {

        if (is_null($id)) {
            $id = Category::latest('id')->first()->id ?? 0;
            $id++;
        }
        return Str::slug($name, '-') . '-' . $id;
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
