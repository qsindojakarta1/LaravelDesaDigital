<?php

namespace App\Http\Controllers\Desa;

use App\Http\Controllers\Controller;
use App\Models\Rt;
use App\Models\Warga;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RtController extends Controller
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
        $attr = $this->validate($request, [
            'rt' => 'required',
            'ketua_rt_id' => 'required',
            'rw_id' => 'required'
        ]);
        Rt::create($attr);

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

        $rt = Rt::find($id);
        $wargas = Warga::where('desa_id', getDesaFromUrl()->id)->get();

        return view('desa.rt.edit', compact('rt', 'wargas'));
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
            'rt' => 'required',
            'ketua_rt_id' => 'required'
        ]);
        Rt::find($id)->update($attr);

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
            Rt::findOrFail($id)->delete();
            Alert::success('success');
            return back();
        } catch (\Throwable $th) {
            Alert::error($th->getMessage());
            return back();
        }
    }
}
