<?php

namespace App\Http\Controllers\Desa;

use App\Http\Controllers\Controller;
use App\Models\Rt;
use App\Models\Rw;
use App\Models\Warga;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RwController extends Controller
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
        $attr = $this->validate($request,[
            'rw' => 'required',
            'ketua_rw_id' => 'required',
            'dusun_id' => 'required'
        ]);
        Rw::create($attr);

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
        $rt = new Rt();
        $rw = Rw::findOrFail($id);
        $rts = Rt::where('rw_id',$id)->get();
        $wargas = Warga::where('desa_id',getDesaFromUrl()->id)->get();
        return view('desa.rw.show',compact('rw','rts','wargas','rt'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rw = Rw::find($id);
        $wargas = Warga::where('desa_id',getDesaFromUrl()->id)->get();
        
        return view('desa.rw.edit',compact('rw','wargas'));
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
            'rw' => 'required',
            'ketua_rw_id' => 'required'
        ]);
        Rw::find($id)->update($attr);

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
            Rw::findOrFail($id)->delete();
            Alert::success('success');
            return back();
        } catch (\Throwable $th) {
            Alert::error($th->getMessage());
            return back();
        }
    }
}
