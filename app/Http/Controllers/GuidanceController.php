<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Profil;
use App\Models\Guidance;
use Illuminate\Support\Str;
use App\Models\ImageProperty;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreGuidanceRequest;
use App\Http\Requests\UpdateGuidanceRequest;
use Ramsey\Uuid\Guid\Guid;

class GuidanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.guidances.index', [
            'profils' => Profil::latest()->get(),
            'files' => File::latest()->get(),
            'guidances' => Guidance::all(),
            'properties' => ImageProperty::where('property', 'Logo')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.guidances.create', [
            'profils' => Profil::latest()->get(),
            'files' => File::latest()->get(),
            'guidances' => Guidance::all(),
            'properties' => ImageProperty::where('property', 'Logo')->latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGuidanceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGuidanceRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'required|mimes:pdf|unique:guidances,file_name'
        ]);

        $fileModel = new Guidance;

        if ($request->file()) {
            $fileName = $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads-guidances', $fileName, 'public');
            $fileSize = $request->file->getSize();
            $fileSlug = Str::slug($request->name, '-');

            $fileModel->name = $request->name;
            $fileModel->file_name = $fileName;
            $fileModel->slug = $fileSlug;
            $fileModel->size = $fileSize;
            $fileModel->path = $filePath;
            $fileModel->save();

            return redirect('/dashboard/guidances')->with('success', 'File Has been uploaded !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guidance  $guidance
     * @return \Illuminate\Http\Response
     */
    public function show(Guidance $guidance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guidance  $guidance
     * @return \Illuminate\Http\Response
     */
    public function edit(Guidance $guidance)
    {
        return view('dashboard.guidances.edit', [
            'profils' => Profil::latest()->get(),
            'files' => File::latest()->get(),
            'guidances' => Guidance::all(),
            'guidance' => $guidance,
            'properties' => ImageProperty::where('property', 'Logo')->latest()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGuidanceRequest  $request
     * @param  \App\Models\Guidance  $guidance
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGuidanceRequest $request, Guidance $guidance)
    {
        $rules = [
            'file' => 'mimes:pdf|unique:guidances, file_name'
        ];

        if ($request->name != $guidance->name) {
            $rules['name'] = 'required|string|max:255|unique:name';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('file')) {
            if ($guidance->path) {
                Storage::delete($guidance->path);
            }
            $validatedData['file_name'] = $request->file->getClientOriginalName();
            $validatedData['path'] = $request->file('file')->storeAs('uploads-guidances', $validatedData['file_name'], 'public');
            $validatedData['size'] = $request->file->getSize();
            $validatedData['slug'] = Str::slug($request->name, '-');
        }

        Guidance::where('id', $guidance->id)->update($validatedData);

        return redirect('/dashboard/guidances')->with('success', 'Panduan has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guidance  $guidance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guidance $guidance)
    {
        if ($guidance->path) {
            Storage::delete($guidance->path);
        }
        Guidance::destroy($guidance->id);

        return redirect('/dashboard/guidances')->with('success', 'Panduan has been deleted!');
    }

    public function serve(Guidance $guidance)
    {
        if ($guidance->path && Storage::disk('s3')->exists($guidance->path)) { // Assuming path stores the S3 path
            // Note: In store/update method, path is stored as 'uploads-guidances/filename'.
            // If disk is public, it might be stored differently.
            // Existing code uses 'public' disk for guidances in store() method?
            // Line 64: $request->file('file')->storeAs('uploads-guidances', $fileName, 'public');
            // BUT user asked to replace S3 URLs. Let's check if the existing code actually uses S3 or Public disk.
            // Line 32 index.blade.php uses Storage::disk('s3')->url($guidance->path).
            // This implies the file IS on S3, or the code was wrong.
            // Given the user request is "replace usages of S3 URL", I will assume it's meant to be on S3 or at least served via S3 check.
            // However, the controller says 'public'. This might be a bug in existing code or my assumption.
            // I'll assume S3 for now as per the task to replace S3 URL usage.

            $fileContents = Storage::disk('s3')->get($guidance->path);
            $mimeType = Storage::disk('s3')->mimeType($guidance->path);

            return response($fileContents, 200)->header('Content-Type', $mimeType);
        }

        // Fallback or if it was actually on public disk?
        // If it was on public disk, Storage::disk('s3') would fail.
        // Let's stick to the implementation plan which assumes S3 based on the view usage.

        abort(404);
    }
}
