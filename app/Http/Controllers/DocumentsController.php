<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DocumentClass;

use App\User;

use App\Document;

use App\Retention;

use Notification;

use Session;

use File;

use DB;

use Carbon\Carbon;

use Auth;



class DocumentsController extends Controller
{
    /**
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $document = Document::where('archive', 0)
                ->get();
        return view('admin.document.index')->with('documents', $document);
    }

    public function pending()
    {
        $document = Document::where('state_id', 1)->where('archive', 0)->orderBy('created_at', 'desc')->paginate(5);
        return view('admin.document.pending')->with('documents', $document);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $document_count = Document::count();
        $document = Document::orderBy('id', 'DESC')->first(); 
        if($document_count == 0){
            $transaction_number = 1;
        }else{
            $transaction_number = $document->transaction_number +1; 
        }
        return view('admin.document.create')->with('classes', DocumentClass::all())->with('users', User::all())->with('transaction_number', $transaction_number)->with('retention', Retention::all());
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
            'document_class_id' => 'required',
            'subject' => 'required',
            'sender' => 'required',
            'origin' => 'required',
            'assign_to_user_id' => 'required',
            'file' => 'required|mimes:pdf'
        ]);

        if($request->input('assign_to_user_id') ==0){

            Session::flash('fail', 'Choose value for assign to user!!!');

            return redirect()->back();

        } else {

            if ($request->has('edit_transaction_number')) {
                $edit_transaction_number = 1;
                $transaction_number = $request->input('transaction_number');

            }else{
                $count = Document::count();
                $edit_transaction_number = 0;                ;
                if($count = 0){
                    $transaction_number = $count + 1;
                }else{  
                    $document = Document::orderBy('id', 'DESC')->first(); 
                    $transaction_number= $document['transaction_number'] + 1;
                }
                
            }

            $uploaded_file = $request->file;

            $new_file_name = time().$request->file->getClientOriginalName();

            $uploaded_file->move('uploads/documents', $new_file_name);

            $users = User::find(request()->cc_user_id);

            $class = DocumentClass::find(request()->document_class_id);

            $current_time = date('Y-m-d H:i:s'); 

            $retention = Retention::find($request->input('retention_id'));

            $m=  date('Y-m-d', strtotime("+$retention->m months", strtotime($current_time)));

            $y=  date('Y-m-d', strtotime("+$retention->y years", strtotime($m)));
            
         

            //$m = disposal_date

            $doc= Document::create([
                'document_class_id' => $request->input('document_class_id'),
                'transaction_number' => $transaction_number,
                'edit_transaction_number' => $edit_transaction_number,
                'assign_to_user_id' => $request->input('assign_to_user_id'),
                'document_no' => $class->tag." - ".date("y")." - ".$transaction_number,
                'subject' => $request->input('subject'),
                'sender' => $request->input('sender'),
                'origin' => $request->input('origin'),
                'state_id' =>1,
                'retention_id' =>$request->input('retention_id'),
                'file' => "uploads/documents/".$new_file_name,
                'file' => "uploads/documents/".$new_file_name,
                'disposal_date' => $y,
                
            ]);

            $doc->cc_users()->attach($users);

            Session::flash('success','Created Successfully');

            return redirect()->route('documents.pending');
  
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($document_no)
    {
        $doc = Document::where('document_no', $document_no)->first();

    return view('admin.document.show')->with('d', $doc);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $document_class = DocumentClass::all();

        $users = User::all();

        return view('admin.document.edit')
                        ->with('document', Document::find($id))
                        ->with('class', $document_class)
                        ->with('user', $users)
                        ->with('retention',Retention::all());
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
            'document_class_id' => 'required',
            'subject' => 'required',
            'sender' => 'required',
            'origin' => 'required',
            'assign_to_user_id' => 'required',
            'cc_user_id' => 'required',
            'file' => 'mimes:pdf'
        ]);
        $document = Document::find($id);
        $class = DocumentClass::find(request()->document_class_id);

            if ($request->has('edit_transaction_number')) {
                $edit_transaction_number = 1;
                $transaction_number = $request->input('transaction_number');
                $document->transaction_number = $transaction_number;
                $document->edit_transaction_number = $edit_transaction_number;
                $document->document_no = $class->tag." - ".date("y")." - ".$transaction_number;
            }else

            if($request->has('file')){
                File::delete($document->file);

                $uploaded_file = $request->file;

                $new_file_name = time().$request->file->getClientOriginalName();
    
                $uploaded_file->move('uploads/documents', $new_file_name);

                $document->file = "uploads/documents/".$new_file_name;
            }
         

            $users = User::find(request()->cc_user_id);

            $retention = Retention::find($request->input('retention_id'));

            $current_time = date('Y-m-d H:i:s'); 

            $m=  date('Y-m-d', strtotime("+$retention->m months", strtotime($current_time)));

            $y=  date('Y-m-d', strtotime("+$retention->y years", strtotime($m)));

            $document->document_class_id = $request->input('document_class_id');
            $document->assign_to_user_id = $request->input('assign_to_user_id');
            $document->subject = $request->input('subject');
            $document->sender = $request->input('sender');
            $document->origin = $request->input('origin');
            $document->state_id = 1;
            $document->retention_id = $request->input('retention_id');
            $document->disposal_date = $y;

            $document->save();

            $document->cc_users()->sync($users);
                
            

            Session::flash('success','Updated Successfully');

            return redirect()->back();
  
    }

    public function state($id){

        $document = Document::find($id);

        $document->state_id = 2;

        $document->save();

        $job = (new \App\Jobs\QueueUserNotificationsJob($id))
        ->delay(Carbon::now()
        ->addMinutes(1));

        dispatch($job);

        $assign = array($document->assign_user);

        // $ccs = array();

        // foreach($document->cc_users as $cc):
        //     array_push($ccs, $cc);
        // endforeach;

        Notification::send($assign, new \App\Notifications\SystemNotification($document));
        //Notification::send($assign, new \App\Notifications\AssignedDocument($document));

        Session::flash('success','`Passed the document to the addressee');

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
        //
    }

    // public function search(Request $request)
    // {
    //     $search = $request->input('search');
    //     if($search == ""){
    //         $search_term = $request->input('search');
    //         $doc = Document::orderBy('created_at', 'Desc')->paginate(5);
    //     }else{
    //         $search_term = $request->    input('search');
    //         $doc = Document::search($request->input('search'))->get();
    //     }
    //     return view('admin.document.index')->with('documents', $doc)->with('search_term', $search_term);
        
    // }

    public function archive(){
        
        $doc = Document::where('archive', 1)->orderBy('disposal_date', 'desc')->paginate(5);

        return view('admin.document.archive')->with('archives', $doc);
    }


   
}
