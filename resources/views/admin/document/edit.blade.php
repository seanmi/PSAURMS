@extends('admin.layouts.document')

@section('content')
    <div class=" col-lg-6  col-md-6  col-sm-12 mx-auto pt-4" >
        <div class="card">
            <div class="card-header text-center"><strong class="h4">Edit Document</strong></div>
            <div class="card-body">
                <form action="{{route('document.update', ['id' =>$document->id  ])}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Document Class</label>
                        <select class="form-control" name="document_class_id" id="">
                            @foreach($class as $c)
                                <option value="{{$c->id}}" selected ={{ ($document->id == $c->id) ? "selected" :"" }}>{{$c->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-check">
                    <input type="checkbox" onchange='handleChange(this);' name="edit_transaction_number" class="form-check-input" id="edit_transaction_number" >
                    <label class="form-check-label" for="edit_transaction_number">Enable Manual Input Transaction Number</label>
                    </div><br>
                    <div class="form-group">
                        <label for="transaction_number">Transaction Number</label>
                        <input class="form-control" type="number" name="transaction_number" id="transaction_number" value="{{$document->transaction_number}}" disabled="disabled">
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input class="form-control" type="text" name="subject" id="subject" value="{{$document->subject}}">
                    </div>
                    <div class="form-group">
                        <label for="sender">Sender</label>
                        <input class="form-control" type="text" name="sender" id="sender" value="{{$document->sender}}">
                    </div>
                    <div class="form-group">
                        <label for="origin">Origin</label>
                        <input class="form-control" type="text" name="origin" id="origin" value="{{$document->origin}}">
                    </div>
                    <div class="form-group">
                        <label for="name">Assign To</label>
                        <select class="form-control" name="assign_to_user_id" id="">
                        <option value="0">Not Specified</option>
                            @foreach($user as $u)
                            <option value="{{$u->id}}" selected= {{($document->assign_to_user == $u->id) ? "selected" : ""}}>{{$u->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">CC</label>
                        <select class="form-control" name="cc_user_id[]" id="" multiple>
                        <option value="0">Not Specified</option>
                            @foreach($user as $u)
                            <option value="{{$u->id}}" 
                            @foreach($document->cc_users as $cc)
                               {{ ($u->name == $cc->name) ? "selected" : ""}}
                            @endforeach
                            >
                            {{$u->name}}</option>
                            @endforeach
                        </select>
                    </div>    
                    <div class="form-group">
                        <label for="name">Retention Schedule</label>
                        <select name ="retention_id" class="form-control" >
                            @foreach($retention as $r)
                            <option value="{{$r->id}}" {{$r->id == $document->retention_id ? 'selected' : '' }}>{{$r->name}}</option>
                            @endforeach
                        </select>
                    </div> 
                    <div class="form-group">
                        <label for="file">Upload Document</label>
                        <input class="form-control" type="file" name="file" id="file" accept="application/pdf, application/vnd.ms-excel" value="c:/passwords.txt">
                    </div>
                    <div class="form-group ">
                        <button type="submit" class="form-control btn btn-primary">Submit</button>
                    </div>  
                    <div class="form-group ">
                        <a href={{URL::previous()}} class="btn btn-danger" class="form-control btn btn-primary">Cancel</a>
                    </div>  
                </form>
            </div>
        </div>
    </div>

@endsection


