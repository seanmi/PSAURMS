<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DocumentClass;

use Session;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.manage.class.index')->with('document_classes', DocumentClass::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manage.class.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' =>'required|min:5|unique:document_classes',
            'tag' => 'required'
        ]);

        DocumentClass::create([
            'name' => $request->input('name'),
            'tag' => $request->input('tag')
        ]);

        Session::flash('success', 'Created Successfully');

        return redirect('class');
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
        return view('admin.manage.class.edit')->with('document_classes', DocumentClass::find($id));
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
        $this->validate($request,[
            'name' => 'required|min:5'
        ]);

        $classification = DocumentClass::find($id)->first();

        $classification->name = $request->input('name');

        $classification->tag
         = $request->input('tag');

        $classification->save();

        Session::flash('success', 'Updated Successfully');

        return redirect('admin.manage.class');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DocumentClass::destroy($id);

        Session::flash('success', 'Deleted Successsfully');

        return redirect()->back();
    }
}
