@extends('admin.layouts.app')

@section('content')

    <div class=" col-lg-6  col-md-6  col-sm-12 mx-auto pt-4" >
        <div class="card">
            <div class="card-header text-center"><strong class="h4">Edit Document Class</strong></div>
            <div class="card-body">
                <form action="{{route('retention.update', ['id' =>$retention->id ])}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Retention Schedule name</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{$retention->name}}">
                    </div>
                    <div class="form-group">
                        <label for="m">Month(s)</label>
                        <input class="form-control" type="text" name="m" id="m" value="{{$retention->m}}">
                    </div>
                    <div class="form-group">
                        <label for="name">Year(s)</label>
                        <input class="form-control" type="text" name="y" id="y" value="{{$retention->y}}">
                    </div>
                    <div class="form-group ">
                        <button type="submit" class="form-control btn btn-primary">Update</button>
                    </div>
                    <div class="form-group ">
                        <a href="{{ route('retentions') }}"  class="form-control btn btn-danger text-white">Cancel</a>
                    </div>
                </form>
            </div>
        </div>               
    </div>        

@endsection


