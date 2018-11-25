@extends('admin.layouts.app')

@section('content')
        <div class="col-lg-7 offset-md-1 col-md-6  col-sm-12 mx-auto pl-4" >
            <a href="{{route('class.create')}}" class="btn btn-success mb-2">Create</a>
            <div class="table-responsive">
                <table class="table text-center table-striped ">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col">Class Name</th>
                            <th scope="col">Tag</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($document_classes as $class)
                            <tr>
                                <td>{{$class->name}}</td>
                                <td>{{$class->tag}}</td>
                                <td>
                                    <div class="btn-group ">                                            
                                        <a href="{{route('class.edit', ['id'=> $class->id])}}" class="btn btn-primary btn-sm"> <i class="fas fa-pencil-alt"></i></a>
                                        <a href="{{route('class.delete', ['id'=> $class->id])}}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>             
        </div>

@endsection


