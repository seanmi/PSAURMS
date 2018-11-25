@extends('admin.layouts.app')

@section('content')

    <div class=" col-lg-6  col-md-6  col-sm-12 mx-auto pt-4" >
        <div class="card">
            <div class="card-header text-center"><strong class="h4">Edit Document Class</strong></div>
            <div class="card-body">
                <form action="{{route('class.update', ['id' =>$document_classes->id ])}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Class name</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{$document_classes->name}}">
                    </div>
                    <div class="form-group ">
                        <button type="submit" class="form-control btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>               
    </div>        

@endsection


