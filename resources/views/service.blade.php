@extends('layouts.main')

@section('container')
    <!-- Service Section -->
    <div class="container py-5" style="margin-top: 8rem;">
        <div class="row justify-content-center mb-5">
            <div class="col-md-10 text-center">
                @foreach ($profils->take(1) as $profil)
                    <h1 class="fw-bold text-gradient mb-4">Layanan {{ $profil->name }}</h1>
                    <p class="text-muted">Berikut adalah berbagai layanan keamanan siber yang disediakan oleh TTIS Kabupaten Tulang Bawang untuk menjaga integritas, ketersediaan, dan kerahasiaan informasi di lingkungan pemerintah daerah.</p>
                @endforeach
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-4">
                        <article class="fs-6" style="line-height: 1.8;">
                            @foreach ($services->take(1) as $service)
                                {!! $service->content !!}
                            @endforeach
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Service Section -->
@endsection
