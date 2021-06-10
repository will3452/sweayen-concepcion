<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;

class IssueController extends Controller
{
    public function getFile($id){
        $template = Template::find($id);
        return storage_path().'/app/'.$template->file;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('issues.index', ['templates'=>Template::all()]);
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
        $tp = new TemplateProcessor($this->getFile($request->template_id));
        unset($request['_token']);
        unset($request['template_id']);
        $tp->setValues($request->all());
        $tp->saveAs('last_docx.docx');
        $phpWord = \PhpOffice\PhpWord\IOFactory::load(public_path('last_docx.docx'));
        $section = $phpWord->addSection();
        $section->addText('<script>window.print();</script>');
        $phpWord->save(public_path('last_docx.html'), 'HTML');
        unlink(public_path('last_docx.docx'));
        return redirect('/results');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tp = new TemplateProcessor($this->getFile($id));
        $fields = $tp->getVariables();
        return view('issues.show', compact('fields', 'id'));
    }

}
