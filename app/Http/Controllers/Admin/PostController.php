<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Tag;
use App\Models\Admin\Post;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['posts'] = Post::all();
        return view('admin.post.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['category'] = Category::all()->pluck('name', 'id');
        $data['tags'] = Tag::all()->pluck('name', 'id');
        return view('admin.post.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request): RedirectResponse
    {
        try {
            $items = $request->all();
            $items['slug'] = 'sffsff';
            $items['is_published'] = $request->has('is_published') ?? 0;
            $post = Post::create($items);
            $post->tags()->sync($items['tags']);
            return redirect()->route('posts.create')->with('success', 'Post saved successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors($e->getMessage())
                ->withInput($request->all);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['post'] = Post::find($id);
        $data['post']->body = app(\Spatie\LaravelMarkdown\MarkdownRenderer::class)->toHtml($data['post']->body);
        return view('admin.post.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['category'] = Category::all()->pluck('name', 'id');
        $data['tags'] = Tag::all()->pluck('name', 'id');
        $data['post'] = Post::find($id);

        return view('admin.post.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        try {
            DB::beginTransaction();
            $items = $request->all();
            $items['is_published'] = $request->has('is_published') ?? 0;

            $post = Post::where('id', $id)->first();

            $post->update($items);

            $post->tags()->sync($items['tags']);
            DB::commit();
            return redirect()->route('posts.update')->with('success', 'Post saved successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors($e->getMessage())
                ->withInput($request->all);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        $post->delete();
        
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}
