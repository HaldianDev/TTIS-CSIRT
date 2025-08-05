@extends('layouts.main')

@section('container')
    <!-- Blog Section -->
    <section id="blog" class="py-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-8 mx-auto text-center">
                    <h1 class="fw-bold text-gradient">Latest Post</h1>
                </div>
            </div>

            @if ($posts->count())
                <div class="row">
                    @foreach ($posts->take(6) as $post)
                        <div class="col-lg-4 col-sm-6 mb-4 d-flex">
                            <div class="modern-card cyber-border w-100">
                                <div class="card-image mt-2">
                                    <!-- <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}">
                                     <img src="../img/logo.png" alt=""  class="d-block mx-auto mt-1"  style="width: 50%; height: 100%;"> -->
                                     <img src="{{ $post->image ? asset('storage/' . $post->image) : asset('img/tb.png') }}"
                                        alt="{{ $post->category->name }}"
                                        class="{{ $post->image ? '' : 'd-block mx-auto' }}"
                                        style="{{ $post->image ? '' : 'width: 35%; height: 100%;' }}">
                                </div>
                                <div class="card-content d-flex flex-column p-3">
                                    <h5 class="card-title mb-2">
                                        <a href="/posts/{{ $post->slug }}" class="text-dark fw-semibold">{{ $post->title }}</a>
                                    </h5>
                                    <p class="small text-muted mb-2">
                                        By <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none fw-medium">{{ $post->author->name }}</a>
                                        • {{ date('M d, Y', strtotime($post->created_at)) }}
                                    </p>
                                    <p class="card-text mb-3 text-secondary">{{ $post->excerpt }}</p>
                                    <a href="/posts/{{ $post->slug }}" class="btn btn-outline-success btn-sm mt-auto align-self-start">Read More →</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center fs-4">No Post Found</p>
            @endif
            <div class="d-flex justify-content-center mt-4">
                <a href="/posts"
                    class="btn btn-lg fw-semibold shadow rounded-pill text-white"
                    style="background: linear-gradient(to right, #1ed6b2, #0c8c7b); border: none;"
                    data-aos="zoom-in" data-aos-delay="200" target="_blank">
                    📰 Berita Lainnya
                </a>
            </div>
        </div>


    </section>
        <!-- Email Encryption Section -->
        <section>
            <div class="container">
                <div class="bg-gradient-dark rounded-4 p-5 p-xl-6 shadow-lg text-center position-relative overflow-hidden encryption-section">
                    <div class="position-absolute top-0 start-0 w-100 h-100 opacity-10" style="background-image: url('/images/encryption-bg.svg'); background-size: cover;"></div>
                    <div class="container my-5">
                    <div class="row justify-content-center">
                            <div class="col-12 col-md-10 col-lg-8 text-center position-relative px-3">
                                <h3 class="display-5 fw-bold text-white mb-3">
                                    <!-- Komunikasi e-mail <span class="text-warning">terenkripsi</span>? -->
                                     Komunikasi <span style="white-space: nowrap;">e-mail</span> <span class="text-warning">terenkripsi</span>?
                                </h3>
                                <p class="fs-6 fs-md-5 text-light mb-3 px-3 px-md-0 text-center text-md-start">
                                Gunakan <strong>Pretty Good Privacy (PGP)</strong> untuk menjaga keamanan data Anda dari ancaman siber.
                                </p>

                                @if ($keys->first())
                                    <a href="{{ asset('storage/public-key/' . $keys->first()->name) }}"
                                        class="btn btn-warning btn-lg fw-semibold shadow rounded-pill text-white"
                                        data-aos="zoom-in" data-aos-delay="200" target="_blank">
                                        🔐 Unduh PGP Key
                                    </a>
                                @else
                                    <p class="text-light">PGP Key belum tersedia.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Email Encryption Section -->
@endsection
