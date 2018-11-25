@extends('admin.layouts.app')

@section('content')
    <div class=" col-lg-6  col-md-6  col-sm-12 mx-auto pt-4" >
        <div class="card">
            <div class="card-header text-center"><strong class="h4">Add user</strong></div>
            <div class="card-body">
                <form action="{{route('user.store')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="department">Department</label>
                        <select name="department_id" id="department" class="form-control">
                            @foreach($departments as $dept)
                                <option value="{{$dept->id}}">{{$dept->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                    <label for="admin">Administrator</label>
                        <select name="administrator" id="admin" class="form-control">
                                <option value="1">Yes</option>
                                <option value="0"selected>No</option>
                        </select>
                    </div>
                    
                    <div class="form-group ">
                        <button type="submit" class="form-control btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>                
    </div>
@endsection

