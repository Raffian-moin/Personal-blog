<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Admin\Tag;
use App\Models\Admin\Post;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['categories'] = Category::all();
        $data['posts'] = Post::all();
        return view("frontend.home.home", $data);
    }

    /**
     * Display top and recent posts
     */
    public function getPostsByKey($key)
    {
        $data['categories'] = Category::all();

        $orderByColumn = "created_at";

        if ($key === "top") {
            $orderByColumn = "total_views";
        }

        $data['posts'] = Post::orderBy($orderByColumn, 'desc')->get();

        return view("frontend.home.home", $data);
    }

    /**
     * Display posts of a certain category
     */
    public function getPostsByCategory($categorySlug)
    {
        $data['categories'] = Category::all();
        $data['posts'] = Post::select('posts.*')
            ->leftJoin('categories', 'categories.id', 'posts.category_id')
            ->where('categories.slug', $categorySlug)
            ->get();

        return view("frontend.home.home", $data);
    }

    /**
     * Display individual post
     */
    public function postDetails($slug)
    {
        $data['post'] = Post::where('slug', $slug)
            ->with('tags')
            ->with('category')
            ->first();

        $data['post']->body = app(\Spatie\LaravelMarkdown\MarkdownRenderer::class)->toHtml($data['post']->body);

        $data['related_posts'] = Post::where('category_id', $data['post']->category_id)
            ->where('id', '!=', $data['post']->id)
            ->take(10)
            ->get();
        $data['recent_posts'] = Post::where('id', '!=', $data['post']->id)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        $data['top_posts'] = Post::where('id', '!=', $data['post']->id)
            ->orderBy('total_views', 'desc')
            ->take(5)
            ->get();

        return view("frontend.post.post_details", $data);
    }

    /**
     * Display posts of a certain category
     */
    public function getTags()
    {
        $data['tags'] = Tag::all();

        return view("frontend.tags", $data);
    }
}
