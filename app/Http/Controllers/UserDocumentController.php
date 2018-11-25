<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Document;

use Auth;

use Session;

use DB;

use App\User;



class UserDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $doc = Document::where('state_id', 2)->where('assign_to_user_id', $id)->where('read', 0)->paginate(5);
        $cc = DB::table('document_cc_users')
                ->join('documents', 'documents.id', '=', 'document_cc_users.document_id')
                ->select('documents.*')
                ->where('document_cc_users.user_id', '=', $id)
                ->where('document_cc_users.read', '=', 0)
                ->where('documents.state_id', '=', 2)
                ->paginate(5);
        return view('user.document.index')->with('documents', $doc)->with('cc_documents', $cc);
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($document_no)
    {
        
        $user_id = Auth::id();
        $document = Document::where('document_no', $document_no)->first();
        $cc = DB::table('document_cc_users')
                        ->select('*')->where('user_id', '=', $user_id)
                        ->where('document_id', '=', $document->id)
                        ->first();
  
        if($document->assign_to_user_id == $user_id){

            $document->read = 1;

            $document->save();  

            return view('user.document.show')->with('d', $document);
          
        }elseif($cc != "" or $cc != null){

            DB::table('document_cc_users')
            ->where('document_id', $document->id)
            ->where('user_id', $user_id)
            ->update(['read' => 1]);

            return view('user.document.show')->with('d', $document);

        }else{

            return redirect()->back();

        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function notification($id){
        $user = User::find($id);
        $notif = array();
        foreach ($user->unreadNotifications as $notification) {
            array_push($notif, $notification);
        }

        return response()->json($notif);

    }

    public function read($id){
        $user = User::find($id);

        foreach ($user->unreadNotifications as $notification) {
        $notification->markAsRead();
        }

        return response()->json('success');
    }
}
