<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $templates = Template::all();
        return view('template.index', compact('templates'));
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'name'=>'required',
            'description'=>'',
            'cover'=>'required',
            'file'=>'required'
        ]);
        // dd($fields);
        $fields['cover'] = $request->cover->store('/public/cover');
        $fields['file'] = $request->file->store('/public/docs');
        Template::create($fields);
        return back()->withSuccess('Done!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $template = Template::find($id);
        Storage::delete($template->cover);
        Storage::delete($template->file);
        $template->delete();
        return back();
    }
}
