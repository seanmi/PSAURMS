@extends('admin.layouts.app')

@section('content')
    <div class=" col-lg-6  col-md-6  col-sm-12 mx-auto pt-4" >
        <div class="card">
            <div class="card-header text-center"><strong class="h4">Create Retention Schedule</strong></div>
            <div class="card-body">
                <form action="{{route('retention.store')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Retention Schedule name</label>
                        <input class="form-control" type="text" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="m">Month(s)</label>
                        <input class="form-control" type="number" name="m" id="m" value="0">
                    </div>
                    <div class="form-group">
                        <label for="y">Year(s)</label>
                        <input class="form-control" type="number" name="y" id="y" value="0">
                    </div>
                    <div class="form-group ">
                        <button type="submit" class="form-control btn btn-primary">Submit</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>

@endsection