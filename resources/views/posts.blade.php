@extends('layouts.main')

@section('container')

<section id="blog" class="py-5" style="margin-top: 60px">
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-8 mx-auto text-center">
                <h1 class="artikel-title fw-bold text-gradient">{{ $title }}</h1>
                <p class="text-muted">Explore our latest articles and updates</p>
            </div>
        </div>

        {{-- Search Form --}}
        <div class="row justify-content-center mb-5">
<div class="col-md-6">
    <form action="/posts">
        @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
        @endif
        @if (request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}">
        @endif

        <div class="input-group shadow-sm rounded-pill overflow-hidden border border-success">
            <span class="input-group-text bg-white border-0 px-3">
                <i class="bi bi-search text-success"></i>
            </span>
            <input type="text" 
                   class="form-control border-0 px-3 py-2" 
                   placeholder="🔍 Cari postingan..." 
                   name="search" 
                   value="{{ request('search') }}">
            <button class="btn px-4 text-white" 
                    type="submit" 
                    style="background-color: #1ed6b2; border: none;">
                Cari
            </button>
        </div>
    </form>
</div>

        </div>

        @if ($posts->count())
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-lg-4 col-md-6 mb-4 d-flex">
                        <div class="modern-card cyber-border w-100 shadow-sm rounded-4 overflow-hidden">
                            <div class="card-image mt-2">
                                <img src="{{ $post->image ? Storage::url($post->image) : asset('img/tb.png') }}"
                                        class="{{ $post->image ? '' : 'd-block mx-auto' }}"
                                        style="{{ $post->image ? '' : 'width: 35%; height: 100%;' }}">
                            </div>
                            <div class="card-content d-flex flex-column p-3">
                                <h5 class="card-title mb-2">
                                    <a href="/posts/{{ $post->slug }}" class="text-dark fw-semibold text-decoration-none">{{ $post->title }}</a>
                                </h5>
                                <p class="small text-muted mb-2">
                                    By <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none fw-medium">{{ $post->author->name }}</a> • {{ date('M d, Y', strtotime($post->created_at)) }}
                                </p>
                                <p class="card-text text-secondary mb-3">{{ $post->excerpt }}</p>
                                <a href="/posts/{{ $post->slug }}" class="btn btn-outline-success btn-sm mt-auto">Read More →</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center fs-4">No Post Found</p>
        @endif

        <div class="d-flex justify-content-end mt-4">
            {{ $posts->links() }}
        </div>
    </div>
</section>

@endsection
