<?php

namespace App\Http\Controllers;

use App\Models\BlogEntry;
use Illuminate\Http\Request;

class BlogEntryController extends Controller
{
    public function __construct() {
        $this->authorizeResource(BlogEntry::class, 'blogEntry');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogEntries = BlogEntry::orderBy('id', 'desc')->get();

        return view('show_blog_entries', ['blogEntries' => $blogEntries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('edit_blog_entry');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->user();
        $blogEntryInput = $request->all();
        $blogEntry = new BlogEntry;
        $blogEntry->user_id = $user->id;
        $blogEntry->author = $user->name;
        $blogEntry->title = $blogEntryInput['title'];
        $blogEntry->text = $blogEntryInput['text'];
        $blogEntry->save();
        return redirect(route('blogEntries.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogEntry  $blogEntry
     * @return \Illuminate\Http\Response
     */
    public function show(BlogEntry $blogEntry)
    {
        return view('show_blog_entry',
            ['blogEntry' => $blogEntry]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogEntry  $blogEntry
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogEntry $blogEntry)
    {
        return view('edit_blog_entry',
            ['blogEntry' => $blogEntry]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogEntry  $blogEntry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogEntry $blogEntry)
    {
        $blogEntry->title = $request->title;
        $blogEntry->text = $request->text;
        $blogEntry->save();
        return redirect(route('blogEntries.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogEntry  $blogEntry
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogEntry $blogEntry)
    {
        $blogEntry->delete();
        return redirect(route('blogEntries.index'));
    }
}
