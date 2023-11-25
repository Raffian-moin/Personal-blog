<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Tag;
use App\Models\Admin\Post;
use Illuminate\Http\Request;
use App\Services\ImageUpload;
use App\Models\Admin\Category;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
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
    public function store(PostRequest $request)
    {
        try {
            return DB::transaction(function () use ($request) {
                $items = $request->all();
                $items['slug'] = time();
                $items['is_published'] = $request->has('is_published') ?? 0;
                if ($request->hasFile('cover_image')) {
                    $uploadedFile = $request->file('cover_image');
                    $items['cover_image'] = (new ImageUpload)->upload($uploadedFile, 'uploads/post/background-image');
                }
                $post = Post::create($items);
                $post->tags()->sync($items['tags']);
                return redirect()->route('posts.create')->with('success', 'Post saved successfully!');
            });
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
            return DB::transaction(function () use ($request, $id) {
                $items = $request->all();
                $items['is_published'] = $request->has('is_published') ?? 0;

                $post = Post::where('id', $id)->first();

                if ($request->hasFile('cover_image')) {
                    $uploadedFile = $request->file('cover_image');
                    $items['cover_image'] = (new ImageUpload)->update($uploadedFile, 'uploads/post/background-image', $post->cover_image);
                }

                $post->update($items);

                $post->tags()->sync($items['tags']);

                return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
            });
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

        DB::transaction(function () use ($post) {
            $post->tags()->detach();
            $post->delete();
        });

        // delete cover image only if post was deleted successfully
        if (!empty($post->cover_image)) {
            (new ImageUpload)->delete($post->cover_image);
        }

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }

    public function uploadPostImage(Request $request)
    {
        try {
            if ($request->hasFile('post_image')) {
                $uploadedFile = $request->file('post_image');
                $path = (new ImageUpload)->upload($uploadedFile, 'uploads/post/image');
                return response()->json(['path' => $path]);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'No image uploaded.']);
        }
    }
}
