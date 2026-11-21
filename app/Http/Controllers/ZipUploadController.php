<?php

namespace App\Http\Controllers;

use App\Models\ZipUpload;
use Illuminate\Http\Request;

class ZipUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $zipUploads = ZipUpload::all();
        return view('zip.index', compact('zipUploads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('zip.create');
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nim' => 'required|unique:zipUploads,nim',
            'nama' => 'required|string|max:255',
            'email' => 'required',
            'zip' => 'required'
        ]);
        $data['user_id'] = auth()->id();
        ZipUpload::create($data);

        return redirect()->route('zip.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ZipUpload $zipUpload)
    {
        return view('zip.show', compact('zipUploads'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ZipUpload $zipUpload)
    {
        return view('zip.edit', compact('zipUploads'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ZipUpload $zipUpload)
    {
        $data = $request->validate([
            'nim' => 'required|unique:zipUploads,nim' . $zipUpload->id,
            'nama' => 'required',
            'email' => 'required',
            'zip' => 'required'
        ]);

        $zipUpload->update($data);

        return redirect()->route('zip.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ZipUpload $zipUpload)
    {
        $zipUpload->delete();
        return redirect()->route('zip.index');
    }
}
