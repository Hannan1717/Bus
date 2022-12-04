<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = DB::select('select * from jadwal_bus');

        return view('jadwal.index')
            ->with('jadwal', $jadwal);
    }

    public function create()
    {
        $bus = DB::select('select * from bus');

        return view('jadwal.add')
            ->with('bus', $bus);
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'id_jadwal' => 'required',
            'rute' => 'required',
            'tgl' => 'required',
            'keberangkatan' => 'required',
            'harga' => 'required',
            'plat' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert(
            'INSERT INTO jadwal( rute, tgl, keberangkatan,harga, plat) VALUES ( :rute, :tgl, :keberangkatan,:harga, :plat)',
            [
                'rute' => $request->rute,
                'tgl' => $request->tgl,
                'keberangkatan' => $request->keberangkatan,
                'harga' => $request->harga,
                'plat' => $request->plat,
            ]
        );

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil disimpan');
    }

    public function edit($id)
    {
        $data = DB::table('jadwal_bus')->where('id_jadwal', $id)->first();
        $bus = DB::select('select * from bus');


        return view('jadwal.edit')->with(['data' => $data, 'bus' => $bus]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            // 'id_jadwal' => 'required',
            'rute' => 'required',
            'tgl' => 'required',
            'keberangkatan' => 'required',
            'harga' => 'required',
            'plat' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update(
            'UPDATE jadwal SET rute = :rute, tgl = :tgl, keberangkatan = :keberangkatan,harga = :harga, plat = :plat WHERE id_jadwal = :id',
            [
                'id' => $id,
                // 'id_jadwal' => $request->id_jadwal,
                'rute' => $request->rute,
                'tgl' => $request->tgl,
                'keberangkatan' => $request->keberangkatan,
                'harga' => $request->harga,
                'plat' => $request->plat,
            ]
        );

        return redirect()->route('jadwal.index')->with('success', 'Data jadwal berhasil diubah');
    }

    public function delete($id)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM jadwal WHERE id_jadwal = :id_jadwal', ['id_jadwal' => $id]);

        // Menggunakan laravel eloquent
        // jadwal::where('id_jadwal', $id)->delete();

        return redirect()->route('jadwal.index')->with('success', 'Data jadwal berhasil dihapus');
    }
}
