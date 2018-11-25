<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Department;

use Carbon\Carbon;

use Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.manage.user.index')->with('users', User::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manage.user.create')->with('departments', Department::all());
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
            'name' => 'required|unique:users',
            'department_id' => 'required',
            'administrator' => 'required'
        ]);

        $count = User::count();

        User::create([
            'name' => $request->input('name'),
            'username' => 'prms'.strval($count+1),
            'password' => bcrypt('password'),
            'department_id' => $request->input('department_id'),
            'administrator' => $request->input('administrator')
        ]);

        Session::flash('success', 'User Successfully Generated');

        return redirect('users');

    }

    /**
     * Display the specified resource.
     *\
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.manage.user.edit')->with('user', User::find($id))->with('departments', Department::all());
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
            'username' => 'required',
            'department_id' => 'required',
            'administrator' => 'required' ,
        ]); 
        
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->department_id = $request->input('department_id');
        $user->administrator = $request->input('administrator');

        if($user->isDirty()){

            Session::flash('success', 'Updated Successfully');

        }else{

            Session::flash('success', 'Nothing Changed');

        }

        if($user->isDirty()){

            $user->save();
            
            Session::flash('success', 'Updated Successfully');

        }else{

            Session::flash('success', 'Nothing to update');

        }

        return redirect('users');
    }

    public function reset($id){
        $user = User::find($id);

        $user->password = bcrypt('password');

        $user->save();

        Session::flash('success', 'Reset Successfully');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        Session::flash('success', 'Deleted Successfully');

        return redirect()->back();
    }
}
