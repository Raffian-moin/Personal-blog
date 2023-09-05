<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Tag;
use App\Http\Requests\TagRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['tags'] = Tag::all();
        return view('admin.tag.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request): RedirectResponse
    {
        try {
            $items = $request->all();
            Tag::create($items);
            return redirect()->route('tags.create')->with('success', 'tag saved successfully!');

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
        $data['tag'] = Tag::find($id);
        return view('admin.tag.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['tag'] = Tag::find($id);
        return view('admin.tag.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, string $id)
    {
        $items = $request->except(['_token', '_method']);

        Tag::where('id', $id)
            ->update($items);

        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Tag::where('id', $id)
            ->delete();
        $data['tags'] = Tag::all();
        return redirect()->route('tags.index')->with('success', 'tag deleted successfully!');
    }
}
