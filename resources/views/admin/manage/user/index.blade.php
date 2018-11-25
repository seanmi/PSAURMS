@extends('admin.layouts.app')

@section('content') 
        <div class="col-lg-7 offset-md-1 col-md-6  col-sm-12 mx-auto pl-3" >
            <a href="{{route('user.create')}}" class="btn btn-success mb-2">Create</a>
           <div class="table-responsive" style="max-width:auto;">
           <table class="table text-center table-striped">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Password</th>
                            <th scope="col">Department</th>
                            <th scope="col">Administrator</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->username}}</td>
                                <td><a href="{{route('user.reset.password', ['id' => $user->id])}}" class="btn btn-warning btn-sm"><i class="fas fa-undo"></i></a></td>
                                <td>
                                   {{str_limit($user->department['name'], 8)}}
                                </td>
                                <td>
                                    @if($user->administrator == 1)
                                        Yes
                                    @else
                                        No
                                    @endif()
                                </td>
                                <td>
                                    <div class="btn-group ">
                                        <a href="{{route('user.edit', ['id' => $user->id])}}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="{{ route('user.delete', ['id' => $user->id])}}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$users->links()}}
           </div>              
        </div>         

@endsection