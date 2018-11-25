@extends('admin.layouts.document')

@section('content')
    <div class=" col-lg-6  col-md-6  col-sm-12 mx-auto pt-4" >
        <div class="card">
            <div class="card-header text-center"><strong class="h4">New Document</strong></div>
            <div class="card-body">
                <form action="{{route('document.store')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Document Class</label>
                        <select class="form-control" name="document_class_id" id="">
                            @foreach($classes as $class)
                            <option value="{{$class->id}}">{{$class->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-check">
                    <input type="checkbox" onchange='handleChange(this);' name="edit_transaction_number" class="form-check-input" id="edit_transaction_number" >
                    <label class="form-check-label" for="edit_transaction_number">Enable Manual Input Transaction Number</label>
                    </div><br>
                    <div class="form-group">
                        <label for="transaction_number">Transaction Number</label>
                        <input class="form-control" type="number" name="transaction_number" id="transaction_number" value="{{$transaction_number}}" disabled="disabled">
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input class="form-control" type="text" name="subject" id="subject">
                    </div>
                    <div class="form-group">
                        <label for="sender">Sender</label>
                        <input class="form-control" type="text" name="sender" id="sender">
                    </div>
                    <div class="form-group">
                        <label for="origin">Origin</label>
                        <input class="form-control" type="text" name="origin" id="origin">
                    </div>
                    <div class="form-group">
                        <label for="name">Assign To</label>
                        <select class="form-control" name="assign_to_user_id" id="">
                        <option value="0" default>Not Specified</option>
                            @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">CC</label>
                        <select name ="cc_user_id[]" class="form-control" multiple="multiple">
                            @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Retention Schedule</label>
                        <select name ="retention_id" class="form-control" >
                            @foreach($retention as $r)
                            <option value="{{$r->id}}">{{$r->name}}</option>
                            @endforeach
                        </select>
                    </div> 
                    <div class="form-group">
                        <label for="file">Upload Document</label>
                        <input class="form-control" type="file" name="file" id="file" accept="application/pdf, application/vnd.ms-excel">
                    </div>
                    <div class="form-group ">
                        <button type="submit" class="form-control btn btn-primary">Submit</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>

@endsection


