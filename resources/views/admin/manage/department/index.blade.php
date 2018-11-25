@extends('admin.layouts.app')

@section('content')
        <div class="col-lg-7 offset-md-1 col-md-6  col-sm-12 mx-auto pl-4" >
            <a href="{{route('dept.create')}}" class="btn btn-success mb-2">Create</a>
            <div class="table-responsive">
                <table class="table text-center table-striped">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col">Department</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($departments as $dept)
                            <tr>
                                <td>{{$dept->name}}</td>
                                <td>
                                    <div class="btn-group ">  
                                        <a href="{{route('dept.edit', ['id'=> $dept->id])}}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="{{route('dept.delete', ['id'=> $dept->id])}}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$departments->links()}}
            </div>              
        </div>

@endsection


