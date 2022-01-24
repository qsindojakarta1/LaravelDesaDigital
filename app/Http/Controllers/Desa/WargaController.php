<?php

namespace App\Http\Controllers\Desa;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Warga;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wargas = Warga::orderBy('created_at', 'desc')->where('desa_id', auth()->user()->desa_id)->get();
        return view('desa.warga.index', [
            'wargas' => $wargas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('desa.warga.create', [
            'warga' => new Warga(),
            'desas' => Desa::where('id', getDesaFromUrl()->id)->get()
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
            'nik' => 'required',
            'kk' => 'required',
            'nama_warga' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'warga_negara' => 'required',
            'desa_id' => 'required',
            'agama_id' => 'required',
            'suku_id' => 'required',
            'pekerjaan_id' => 'required',
            'pendidikan_id' => 'required',
            'status_perkawinan_id' => 'required',
            'golongan_darah_id' => 'required',
            'dusun_id' => 'required',
            'rw_id' => 'required',
            'rt_id' => 'required'
        ]);
        try {
            Warga::create($attr);
            Alert::success('success');
            return back();
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
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
        return view('desa.warga.edit', [
            'warga' => Warga::findOrFail($id),
            'desas' => Desa::where('id', getDesaFromUrl()->id)->get()
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
            'nik' => 'required',
            'kk' => 'required',
            'nama_warga' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'warga_negara' => 'required',
            'desa_id' => 'required',
            'agama_id' => 'required',
            'suku_id' => 'required',
            'pekerjaan_id' => 'required',
            'pendidikan_id' => 'required',
            'status_perkawinan_id' => 'required',
            'golongan_darah_id' => 'required',
            'dusun_id' => 'required',
        ]);
        try {
            if($request->rw_id){
                $attr['rw_id'] = $request->rw_id;
            }
            if($request->rt_id){
                $attr['rt_id'] = $request->rt_id;
            }
            Warga::findOrFail($id)->update($attr);
            Alert::success('success');
            return back();
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
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
            Warga::findOrFail($id)->delete();
            Alert::success('success');
            return back();
        } catch (\Throwable $th) {
            Alert::error($th->getMessage());
            return back();
        }
    }
}
