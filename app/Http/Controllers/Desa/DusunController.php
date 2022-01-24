<?php

namespace App\Http\Controllers\Desa;

use App\Http\Controllers\Controller;
use App\Models\Dusun;
use App\Models\Rw;
use App\Models\Warga;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DusunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dusuns = Dusun::where('desa_id', getDesaFromUrl()->id)->latest()->get();
        return view('desa.dusun.index', compact('dusuns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dusun = new Dusun();
        return view('desa.dusun.create', compact('dusun'));
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
            'nama_dusun' => 'required',
            'ketua_dusun_id' => 'required'
        ]);
        $attr['desa_id'] = getDesaFromUrl()->id;
        Dusun::create($attr);
        Alert::success('success',' success create dusun');
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
        $dusun = Dusun::findOrFail($id);
        $rws = Rw::where('dusun_id',$id)->get();
        $wargas = Warga::where('desa_id',getDesaFromUrl()->id)->get();
        return view('desa.dusun.show',compact('dusun','rws','wargas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dusun = Dusun::findOrFail($id);
        return view('desa.dusun.edit', compact('dusun'));
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
        $attr = $this->validate($request,[
            'nama_dusun' => 'required'
        ]);
        if($request->ketua_dusun_id){
            $attr['ketua_dusun_id'] = $request->ketua_dusun_id;
        }
        $attr['desa_id'] = getDesaFromUrl()->id;
        Dusun::findOrFail($id)->update($attr);
        Alert::success('success','success update dusun');
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
            Dusun::findOrFail($id)->delete();
            Alert::success('success');
            return back();
        } catch (\Throwable $th) {
            Alert::error('error',$th->getMessage());
            return back();
        }
    }
}
