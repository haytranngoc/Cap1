<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
use Session;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index')->with('tags', $tags);
    }

    public function store(Request $request)
    {
        $this->validate($request, array('name' => 'required|max:255'));
        $tag = new Tag;
        $tag->name = $request->name;
        $tag->save();
        Session::flash('success', 'New Tag was successfully created!');
        return redirect()->route('admin.tags.index');
    }

    public function show($id)
    {
        $tag = Tag::find($id);
        return view('admin.tags.show')->with('tag', $tag);
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('admin.tags.edit')->with('tag', $tag);
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);
        $this->validate($request, ['name' => 'required|max:255']);
        $tag->name = $request->name;
        $tag->save();
        Session::flash('success', 'Successfully saved your new tag!');
        return redirect()->route('admin.tags.show', $tag->id);
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->posts()->detach();
        $tag->delete();
        Session::flash('success', 'Tag was deleted successfully');
        return redirect()->route('admin.tags.index');
    }
}
