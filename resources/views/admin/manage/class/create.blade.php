@extends('admin.layouts.app')

@section('content')
    <div class=" col-lg-6  col-md-6  col-sm-12 mx-auto pt-4">
        <div class="card">
            <div class="card-header text-center"><strong class="h4">Add Document Class</strong></div>
            <div class="card-body">
                <form action="{{route('class.store')}}" method="POST">
                    {{csrf_field()}}    
                    <div class="form-group">
                        <label for="name">Class name</label>
                        <input class="form-control" type="text" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="tag">Tag</label>
                        <input class="form-control" type="tag" name="tag" id="tag">
                    </div>
                    <div class="form-group ">
                        <button type="submit" class="form-control btn btn-primary">Submit</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>

@endsection