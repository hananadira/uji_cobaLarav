<?php

namespace App\Http\Controllers;

use App\Models\Rombel;
use Illuminate\Http\Request;

class RombelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rombels = Rombel::all();
        return view('rombels.index', compact('rombels')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rombels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'jurusan'=>'required',
            'no_rombel'=>'required',
        ]);

        Rombel::create([
            'jurusan'=> $request->jurusan,
            'no_rombel'=> $request->no_rombel,
        ]);
        //atau jika seluruh data input akan dimasukan langsung ke db bisa dengan perintah 
        //Medicine::create($request->all());

        return redirect()->back()->with('success', 'Berhasil menambahkan data obat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rombel  $rombel
     * @return \Illuminate\Http\Response
     */
    public function show(Rombel $rombel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rombel  $rombel
     * @return \Illuminate\Http\Response
     */
    public function edit(Rombel $rombels, $id)
    {
        $rombels = Rombel::find($id);

        return view('rombels.edit', compact('rombels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rombel  $rombel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'jurusan'=>'required|min:3',
            'no_rombel'=>'required',
        ]);

        Rombel::where('id', $id)->update([
            'jurusan'=> $request->jurusan,
            'no_rombel'=> $request->no_rombel,
        ]);

        return redirect()->route('rombel.index')->with('success', 'Berhasil mengubah data obat!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rombel  $rombel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rombel::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }
    }

