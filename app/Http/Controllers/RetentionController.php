<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Retention;

use Session;

class RetentionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.manage.retention.index')->with('retentions', Retention::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.manage.retention.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'm' => 'required',
            'y' => 'required',
        ]);

        Retention::create([
            'name' => request()->name,
            'm' => request()->m,
            'y' => request()->y,
        ]);

        Session::flash('success', 'Created Successfully');

        return redirect('retentions');
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
        return view('admin.manage.retention.edit')->with('retention',Retention::find($id));
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
        $this->validate($request, [
            'name' => 'required',
            'm' => 'required',
            'y' => 'required',
        ]);

        $retention = Retention::find($id);
        
        $retention->name = request()->name;
        $retention->m = request()->m;
        $retention->y = request()->y;

        $retention->save();

        Session::flash('success', 'Updated Successfully');

        return redirect('retentions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Retention::destroy([$id]);

        Session::flash('success', 'Deleted Successfully');

        return redirect()->back();
    }
}
