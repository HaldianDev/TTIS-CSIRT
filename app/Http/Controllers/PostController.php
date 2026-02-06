<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Post;
use App\Models\User;
use App\Models\Footer;
use App\Models\Profil;
use App\Models\Category;
use App\Models\ImageProperty;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Key;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view('posts', [
            "title" => "All Posts" . $title,
            "active" => 'posts',
            "includeHero" => false,
            'footers' => Footer::latest()->get(),
            'categories' => Category::all(),
            'profils' => Profil::latest()->get(),
            'files' => File::latest()->get(),
            'keys' => Key::latest()->get(),
            'propertiez'  => ImageProperty::where('property', 'Banner')->latest()->get(),
            'properties' => ImageProperty::where('property', 'Logo')->latest()->get(),
            "posts" => Post::where('published', true)->latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view(
            'post',
            [
                "title" => "Single Post",
                "active" => 'posts',
                "includeHero" => false,
                'profils' => Profil::latest()->get(),
                'footers' => Footer::latest()->get(),
                'posts' => Post::where('published', true)->latest()->get(),
                'files' => File::latest()->get(),
                'categories' => Category::all(),
                'keys' => Key::latest()->get(),
                'propertiez'  => ImageProperty::where('property', 'Banner')->latest()->get(),
                'properties' => ImageProperty::where('property', 'Logo')->latest()->get(),
                "post" => $post
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    public function serveImage(Post $post)
    {
        if ($post->image && Storage::disk('s3')->exists($post->image)) {
            $fileContents = Storage::disk('s3')->get($post->image);
            $mimeType = Storage::disk('s3')->mimeType($post->image);

            return response($fileContents, 200)->header('Content-Type', $mimeType);
        }

        abort(404);
    }
}
