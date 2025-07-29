@extends('layouts.main')

@section('container')
<!-- Contact Section -->
<div class="container" style="margin-top: 8rem">
    <div class="row justify-content-center mb-5">
        <div class="col-md-10">
            <div class="p-4 p-md-5 shadow rounded bg-white border border-2 border-light">
                <h1 class="mb-4 text-center fw-bold text-gradient">Hubungi Kami</h1>

                @foreach ($footers->take(1) as $footer)
                    <div class="mb-4">
                        <h5 class="fw-semibold"><i class="bi bi-geo-alt-fill text-success"></i> Lokasi {{ $footer->name }}</h5>
                        <p class="mb-1">{{ $footer->address }}</p>

                        <div class="map mt-3 rounded overflow-hidden" style="height: 300px">
                            {!! $footer->maps !!}
                        </div>
                    </div>

                    <div class="mb-3">
                        <h5 class="fw-semibold"><i class="bi bi-envelope-fill text-primary"></i> Email</h5>
                        <p class="mb-1">
                            {{ $footer->email }}
                            @foreach ($keys->take(1) as $key)
                                <br><i class="bi bi-shield-lock-fill text-warning"></i>
                                <small class="text-muted">Gunakan PGP untuk komunikasi terenkripsi. 
                                    <a href="{{ asset('storage/' . $key->path) }}" class="text-decoration-underline" target="_blank">
                                        🔐 Unduh PGP Key
                                    </a>
                                </small>
                            @endforeach
                        </p>
                    </div>

                    <div class="mb-3">
                        <h5 class="fw-semibold"><i class="bi bi-telephone-fill text-danger"></i> Telepon</h5>
                        <p>{{ $footer->telephone }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- End Contact Section -->
@endsection
