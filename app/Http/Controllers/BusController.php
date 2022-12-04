<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusController extends Controller
{
    public function index()
    {
        $bus = DB::select('select * from bus');

        return view('bus.index')
            ->with('bus', $bus);
    }

    public function create()
    {
        return view('bus.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'merk' => 'required',
            'gambar' => 'required',
            'otobus' => 'required',
            'tipe' => 'required',
            'kelas' => 'required',
            'delete_at' => '',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert(
            'INSERT INTO bus( gambar,merk,otobus, tipe,kelas, delete_at) VALUES (:gambar, :merk, :otobus, :tipe,:kelas, :delete_at)',
            [
                'gambar' => $request->gambar,
                'merk' => $request->merk,
                'otobus' => $request->otobus,
                'tipe' => $request->tipe,
                'kelas' => $request->kelas,
                'delete_at' => $request->delete_at,
            ]
        );

        return redirect()->route('bus.index')->with('success', 'Bus berhasil disimpan');
    }

    public function edit($id)
    {
        $data = DB::table('bus')->where('plat', $id)->first();

        return view('bus.edit')->with('data', $data);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'gambar' => 'required',
            'merk' => 'required',
            'otobus' => 'required',
            'tipe' => 'required',
            'kelas' => 'required',
            // 'delete_at' => '',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update(
            'UPDATE bus SET gambar = :gambar, merk = :merk, otobus = :otobus, tipe = :tipe, kelas = :kelas WHERE plat = :id',
            [
                'id' => $id,
                'gambar' => $request->gambar,
                'merk' => $request->merk,
                'otobus' => $request->otobus,
                'tipe' => $request->tipe,
                'kelas' => $request->kelas,
                // 'delete_at' => $request->delete_at,
            ]
        );

        return redirect()->route('bus.index')->with('success', 'Data bus berhasil diubah');
    }

    public function delete($id)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM bus WHERE plat = :plat', ['plat' => $id]);

        // Menggunakan laravel eloquent
        // bus::where('plat', $id)->delete();

        return redirect()->route('bus.index')->with('success', 'Data bus berhasil dihapus');
    }
}
