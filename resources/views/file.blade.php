@extends('layouts.main')

@section('container')
<div class="container mb-4 d-flex justify-content-center" style="margin-top: 7rem">
    <div class="col-md-8">
        @foreach ($profils->take(1) as $profil)
            <h2 class="text-center mt-3">RFC2350 {{ $profil->name }}</h2>
        @endforeach
        <br />
        <hr class="mx-auto" style="width: 50%">
        <br />
        <div id="my_pdf" class="mb-4" style="height: 600px;"></div>
    </div>      
</div>

<script nonce="{{ csp_nonce() }}" src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.7/pdfobject.min.js"></script>

@php
    $file = $files->first();
@endphp

@if ($file)
  <script nonce="{{ csp_nonce() }}">
    document.addEventListener("DOMContentLoaded", function () {
        var options = {
            url: "{{ asset('storage/' . $file->path) }}",
            id: "#my_pdf"
        };

        // Coba embed
        var pdfSupported = PDFObject.embed(options.url, options.id);

        // Jika tidak didukung, tampilkan link download manual
        if (!pdfSupported) {
            document.querySelector(options.id).innerHTML = `
                <p class="text-center">Browser tidak mendukung tampilan PDF langsung.<br>
                <a href="${options.url}" class="btn btn-primary mt-3" target="_blank">Download PDF</a></p>
            `;
        }
    });
</script>

@else
    <p class="text-center text-muted">Tidak ada file PDF yang tersedia.</p>
@endif

@endsection
