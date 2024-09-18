<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Profile;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class ProfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = Profile::all();
        return view('admin.profile.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.profile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_lengkap' => 'required|string|max:55',
            'no_telpon' => 'required|string|max:15',
            'email' => 'required|string|email|max:55',
            'description' => 'nullable|string',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'alamat' => 'nullable|string|max:255',


        ]);

        if ($request->hasFile('picture')) {
            $image = $request->file('picture');
            $path = $image->store('public/image');
            $name = basename($path); //menyimpan nama filenya saja
        }
        //Insert into profiles()values():
        Profile::create([
            'picture' => $name,
            'nama_lengkap' => $request->nama_lengkap,
            'no_telpon' => $request->no_telpon,
            'email' => $request->email,
            'description' => $request->description,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'alamat' => $request->alamat,
        ]);
        return redirect()->route('profiles.index')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Profile::findOrFail($id);
        $idProfile = $data->id;
        $experience = Experience::where('id_profile', $idProfile)->get();
        $pdf = Pdf::loadView('admin.generate-pdf.index', compact(['data', 'experience']));
        // dd($pdf);
        return $pdf->download('Portfolio.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $profile = Profile::findOrFail($id);
        return view('admin.profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $profile = Profile::findOrFail($id);
        $request->validate([
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_lengkap' => 'nullable|string|max:55',
            'no_telpon' => 'nullable|string|max:15',
            'email' => 'nullable|string|email|max:55',
            'description' => 'nullable|string',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'alamat' => 'nullable|string|max:255',

        ]);
        //simpan gambar jika ada di upload
        if ($request->hasFile('picture')) {
            //hapus gambar lama jika ada
            if ($profile->picture) {
                Storage::delete('public/image/' . $profile->picture);
            }
            $image = $request->file('picture');
            $path = $image->storage('public/image');
            $name = basename($path);
            $profile->picture = $name;
        }

        $profile->nama_lengkap = $request->nama_lengkap;
        $profile->alamat = $request->alamat;
        $profile->no_telpon = $request->no_telpon;
        $profile->email = $request->email;
        $profile->facebook = $request->facebook;
        $profile->linkedin = $request->linkedin;
        $profile->instagram = $request->instagram;
        $profile->description = $request->description;
        $profile->twitter = $request->twitter;
        $profile->save();

        return redirect()->route('profiles.index')->with('success', 'Update Profile Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $profile = Profile::withTrashed()->findOrFail($id);
        if ($profile->picture) {
            Storage::delete('public/image/' . $profile->pucture);
        }
        $profile->forceDelete();
        return redirect()->route('profiles.index')->with('success', 'Data Berhasil Dihapus Permanen');
    }

    public function softdelete(string $id)
    {
        $profile = Profile::findOrFail($id);
        $profile->delete();
        return redirect()->route('profiles.index')->with('success', 'Data Berhasil Dihapus Sementara');
    }
    public function updateStatus($id): JsonResponse
    {
        //Select Profilenya, baru di update menjadi 0
        Profile::where('id', '!=', $id)->update(['status' => 0]);
        // Select Profilenya berdasarkan id lalu diupdate menjadi 1
        $profile = Profile::findOrFail($id);
        $profile->status = 1;
        $profile->save();

        return response()->json(['success' => 'Status Berhasil di perbarui.']);
    }
    public function recycle()
    {
        $profiles = Profile::onlyTrashed()->paginate(15);
        return view('admin.profile.recycle', compact('profiles'));
    }
    public function restore($id)
    {
        $profile = Profile::withTrashed()->findOrFail($id);
        $profile->restore();
        return redirect()->route('profiles.index')->with('success', 'Data Berhasil di restore');
    }

    // public function balikinData($id)
    // {
    //     $profiles = Profile::withTrashed()->findOrFaild($id);
    //     $profiles->restore();
    //     return redirect()->route('profiles.index')->with('success', 'Data Berhasil dikembalikan');
    // }
}