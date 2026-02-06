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

        {{-- Div target PDF --}}
        <div id="my_pdf" class="mb-4" style="height: 600px; width: 100%; border:1px solid #ccc;"></div>
    </div>
</div>

{{-- PDFObject --}}
<script nonce="{{ csp_nonce() }}" src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.7/pdfobject.min.js"></script>

@php
    $file = $files->first();
@endphp

@if ($file)
<script nonce="{{ csp_nonce() }}">
document.addEventListener("DOMContentLoaded", function () {
    var pdfUrl = "{{ route('files.servePdf', ['filename' => basename($file->path)]) }}"; // Laravel route serve PDF
    var pdfSupported = PDFObject.embed(pdfUrl, "#my_pdf");

    if (!pdfSupported) {
        document.querySelector("#my_pdf").innerHTML = `
            <p class="text-center text-muted">
                Browser tidak mendukung PDF embed.<br>
                <a href="${pdfUrl}" class="btn btn-warning mt-3" target="_blank">Download PDF</a>
            </p>
        `;
    }
});
</script>
@else
<p class="text-center text-muted">Tidak ada file PDF yang tersedia.</p>
@endif

@endsection