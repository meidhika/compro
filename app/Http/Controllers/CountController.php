<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('latihan.index');
    }
    public function jumlah()
    {
        $jumlah = 0;
        return view('latihan.jumlah', compact(['jumlah']));
    }
    public function storejumlah(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;

        $jumlah = $angka1 + $angka2;

        return view('latihan.jumlah', compact(['jumlah']));
    }
    public function kurang()
    {
        $jumlah = 0;
        return view('latihan.kurang', compact(['jumlah']));
    }
    public function storekurang(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;

        $jumlah = $angka1 - $angka2;

        return view('latihan.kurang', compact(['jumlah']));
    }
    public function kali()
    {
        $jumlah = 0;
        return view('latihan.kali', compact(['jumlah']));
    }
    public function storekali(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;

        $jumlah = $angka1 * $angka2;

        return view('latihan.kali', compact(['jumlah']));
    }
    public function bagi()
    {
        $jumlah = 0;
        return view('latihan.bagi', compact(['jumlah']));
    }
    public function storebagi(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;

        if ($angka2 !== 0) {
            $jumlah = $angka1 / $angka2;
        } else {
            $bagi = 'Error: Nggak Bisa dibagi 0';
        }
        return view('latihan.bagi', compact('jumlah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
