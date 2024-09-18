<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Profile;
use Illuminate\Http\Request;

class ExpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiences = Experience::all();
        return view('admin.experience.index', compact('experiences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $profile = Profile::all();
        // $id = $profile->id;

        // $experience = Experience::where('id_profile', $id)->get();
        return view('admin.experience.create', compact('profile'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_profile' => 'nullable|integer',
            'judul' => 'nullable|string',
            'sub_judul' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'awal_kerja' => 'nullable|date',
            'akhir_kerja' => 'nullable|date',
        ]);
        Experience::create([
            'id_profile' => $request->id_profile,
            'judul' => $request->judul,
            'sub_judul' => $request->sub_judul,
            'deskripsi' => $request->deskripsi,
            'awal_kerja' => $request->awal_kerja,
            'akhir_kerja' => $request->akhir_kerja
        ]);
        return redirect()->route('experience.index')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $experience = Experience::findOrFail($id);
        return view('admin.experience.edit', compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $experience = Experience::findOrFail($id);
        $request->validate([
            'id_profile' => 'nullable|integer',
            'judul' => 'nullable|string',
            'sub_judul' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'awal_kerja' => 'nullable|date',
            'akhir_kerja' => 'nullable|date',

        ]);
        $experience->id_profile = $request->id_profile;
        $experience->judul = $request->judul;
        $experience->sub_judul = $request->sub_judul;
        $experience->deskripsi = $request->deskripsi;
        $experience->awal_kerja = $request->awal_kerja;
        $experience->akhir_kerja = $request->akhir_kerja;
        $experience->save();
        return redirect()->route('experience.index')->with('success', 'Update Experience Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $experience = Experience::withTrashed()->findOrFail($id);
        $experience->forceDelete();
        return redirect()->route('experience.index')->with('success', 'Data Berhasil Dihapus Permanen');
    }
    public function softdelete(string $id)
    {
        $experience = Experience::findOrFail($id);
        $experience->delete();
        return redirect()->route('experience.index')->with('success', 'Data Berhasil Dihapus Sementara');
    }
    public function recycle()
    {
        $experiences = Experience::onlyTrashed()->paginate(15);
        return view('admin.experience.recycle', compact('experiences'));
    }
    public function restore($id)
    {
        $experience = Experience::withTrashed()->findOrFail($id);
        $experience->restore();
        return redirect()->route('experience.index')->with('success', 'Data Berhasil di restore');
    }
   
}