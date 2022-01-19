<?php

namespace App\Http\Controllers\Desa;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Tag;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::where('desa_id',getDesaFromUrl()->id)->latest()->get();
        return view('desa.page.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = new Page();
        $tags = Tag::where('desa_id',getDesaFromUrl()->id)->get();
        return view('desa.page.create',compact('page','tags'));
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
            'judul' => 'required',
            'content' => 'required',
            'tag_id' => 'required|exists:tags,id'
        ]);
        $attr['desa_id'] = getDesaFromUrl()->id;
        Page::create($attr);
        Alert::success('success','success create page');
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
        
        $page = Page::findOrFail($id);
        $tags = Tag::where('desa_id',getDesaFromUrl()->id)->get();
        return view('desa.page.edit',compact('page','tags'));
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
            'judul' => 'required',
            'content' => 'required',
            'tag_id' => 'required|exists:tags,id'
        ]);
        $attr['desa_id'] = getDesaFromUrl()->id;
        Page::findOrFail($id)->update($attr);
        Alert::success('success','success update page');
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
        Page::findOrFail($id)->delete();
        Alert::success('success','success delete page');
        return back();
    }
}
