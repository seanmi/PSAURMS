@extends('admin.layouts.app')

@section('content')
    <div class=" col-lg-6  col-md-6  col-sm-12 mx-auto pt-4" >
        <div class="card">
            <div class="card-header text-center"><strong class="h4">Edit user</strong></div>
            <div class="card-body">
                <form action="{{route('user.update', ['id' => $user->id])}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{$user->name}}" >
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="form-control" type="text" name="username" id="username" value="{{$user->username}}">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" id="password" value="{{$user->password}}" disabled>
                    </div>
                    <div class="form-group">
                    <label for="department">Department</label>
                        <select name="department_id" id="department" class="form-control">
                            @foreach($departments as $dept)
                                <option value="{{$dept->id}}" {{($dept->id == $user->department_id) ? 'selected': ''}}>{{$dept->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                    <label for="admin">Administrator</label>                   
                        <select name="administrator" id="admin" class="form-control">
                                @if($user->administrator == 1)
                                <option value="1" selected>Yes</option>
                                <option value="0">No</option>
                                @else
                                <option value="1" >Yes</option>
                                <option value="0" selected>No</option>
                                @endif

                        </select>
                    </div>
                    
                    <div class="form-group ">
                        <button type="submit" class="form-control btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>             
    </div>
@endsection

