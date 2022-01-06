<?php

namespace App\Http\Controllers\Desa;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\Informasi;
use App\Models\KategoriInformasi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informasis = Informasi::orderBy('created_at', 'desc')->get();
        return view('desa.informasi.index', [
            'informasis' => $informasis
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('desa.informasi.create', [
            'informasi' => new Informasi(),
            'desas' => Desa::get(),
            'kategori_informasis' => KategoriInformasi::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attr = $this->validate($request, [
            'desa_id' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'thumbnail' => 'required',
            'kategori_informasi_id' => 'required'
        ]);

        $name = Carbon::now()->format('Ymd').'_'. $request->file('thumbnail')->getClientOriginalName();
        $path = $request->file('thumbnail')->storeAs('desa/informasi',$name);
        $attr['thumbnail'] = $path;
        Informasi::create($attr);
        Alert::success('success');
        return back();
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
        return view('desa.informasi.edit', [
            'informasi' => Informasi::findOrFail($id),
            'desas' => Desa::get(),
            'kategori_informasis' => KategoriInformasi::get()
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
        $attr = $this->validate($request, [
            'desa_id' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'kategori_informasi_id' => 'required'
        ]);
        if($request->thumbnail){
            $name = Carbon::now()->format('Ymd').'_'. $request->file('thumbnail')->getClientOriginalName();
            $path = $request->file('thumbnail')->storeAs('desa/informasi',$name);
            Storage::delete(Informasi::findOrFail($id)->thumbnail);
            $attr['thumbnail'] = $path;
        }
        Informasi::findOrFail($id)->update($attr);
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
        try {
            Informasi::findOrFail($id)->delete();
            Alert::success('success');
            return back();
        } catch (\Throwable $th) {
            Alert::error($th->getMessage());
            return back();
        }
    }
}
