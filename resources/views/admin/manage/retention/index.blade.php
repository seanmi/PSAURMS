@extends('admin.layouts.app')

@section('content')
        <div class="col-lg-7 offset-md-1 col-md-6  col-sm-12 mx-auto pl-4" >
            <a href="{{route('retention.create')}}" class="btn btn-success mb-2">Create</a>
            <div class="table-responsive">
                <table class="table text-center table-striped">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col">Retention Schedule Name</th>
                            <th scope="col">Month(s)</th>
                            <th scope="col">Year(s)</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($retentions as $retention)
                            <tr>
                                <td>{{$retention->name}}</td>
                                <td>{{$retention->m}}</td>
                                <td>{{$retention->y}}</td>
                                <td>
                                    <div class="btn-group ">                                          
                                        <a href="{{route('retention.edit', ['id'=> $retention->id])}}" class="btn btn-primary btn-sm"> <i class="fas fa-pencil-alt"></i></a>
                                        <a href="{{route('retention.delete', ['id'=> $retention->id])}}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>             
        </div>

@endsection

