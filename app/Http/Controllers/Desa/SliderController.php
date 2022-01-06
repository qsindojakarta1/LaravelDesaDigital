<?php

namespace App\Http\Controllers\Desa;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::where('desa_id',getDesaFromUrl()->id)->get();
        return view('desa.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slider = new Slider();
        return view('desa.slider.create',compact('slider'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = Carbon::now()->format('Ymd').'_'. $request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->storeAs('desa/slider/',$name);
        Slider::create([
            'photo' => $path,
            'link' => $request->link,
            'teks' => $request->teks,
            'desa_id' => auth()->user()->desa_id
        ]);
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
        
        $slider = Slider::findOrFail($id);
        return view('desa.slider.edit',compact('slider'));
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
            'link' => 'required',
            'teks' => 'required'
        ]);
        if($request->photo){
            $name = Carbon::now()->format('Ymd').'_'. $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('desa/slider/',$name);
            Storage::delete(Slider::findOrFail($id)->photo);
            $attr['photo'] = $path;
        }
        Slider::findOrFail($id)->update($attr);
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
        $slider = Slider::findOrFail($id);
        Storage::delete($slider->photo);
        $slider->delete();
        Alert::success('Success');
        return back();
    }
}
