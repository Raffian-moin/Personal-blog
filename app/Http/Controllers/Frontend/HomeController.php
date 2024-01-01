<?php

namespace App\Http\Controllers\Frontend;

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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getPostsByKey($key) {
        $data['categories'] = Category::all();

        if ($key === "recent") {
            $orderByColumn = "created_at";
        } else if ($key === "top") {
            $orderByColumn = "total_views";
        }

        $data['posts'] = Post::orderBy($orderByColumn, 'desc')->get();

        return view("frontend.home.home", $data);
    }

    public function postDetails($slug)
    {
        $data['post'] = Post::where('slug', $slug)
                            ->with('tags')
                            ->with('category')
                            ->first();
        $data['related_posts'] = Post::where('category_id', $data['post']->category_id)
                                    ->where('id', '!=', $data['post']->id)
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
}
