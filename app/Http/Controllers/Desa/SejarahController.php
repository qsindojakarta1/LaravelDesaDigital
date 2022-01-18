<?php

namespace App\Http\Controllers\Desa;

use App\Http\Controllers\Controller;
use App\Models\Sejarah;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SejarahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Sejarah::where('desa_id', $id)->firstOrFail()->desa_id != getDesaFromUrl()->id) {
            toast('akses dilarang', 'warning');
            return back();
        }
        if (!Sejarah::where('desa_id', $id)->exists()) {
            Sejarah::create([
                'desa_id' => getDesaFromUrl()->id
            ]);
        }
        $sejarah = Sejarah::where('desa_id', $id)->firstOrFail();
        return view('desa.sejarah.edit', [
            'sejarah' => $sejarah
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Sejarah::where('desa_id', $id)->firstOrFail()->desa_id != getDesaFromUrl()->id) {
            toast('akses dilarang', 'warning');
            return back();
        }
        $attr = $this->validate($request, [
            'judul' => 'required',
            'content' => 'required'
        ]);

        Sejarah::findOrFail($id)->update($attr);
        Alert::success('success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
