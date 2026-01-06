<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SimulasiController extends Controller
{
    public function submit(Request $request)
    {
        // validasi sederhana
        $request->validate([
            'nama'     => 'required|string',
            'telepon'  => 'required|string',
            'email'    => 'required|email',
            'jenis'    => 'required|in:deposito,kredit',
        ]);

        // redirect sesuai jenis simulasi
        if ($request->jenis === 'deposito') {
            return redirect()->route('simulasi.deposito');
        }

        return redirect()->route('simulasi.kredit');
    }
}
