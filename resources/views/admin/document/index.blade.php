@extends('admin.layouts.document')

@section('content')
<div class=" col-lg-9  col-md-6  col-sm-12" style="padding-right:40px;"><br><br>
<table id="example" class="table table-striped table-bordered table-responsive" style="width:100%; font-size: 0.8rem;">
        <thead>
            <tr class="text-center">
                <th>Document no</th>
                <th>Class</th>
                <th>Date Recieved</th>
                <th>Sender</th>
                <th>Origin</th>
                <th>Subject</th>
                <th>Assigned to  </th>
                <th>State</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          @foreach($documents as $d)
            <tr class="text-center">
                <td>{{$d->document_no}}</td>
                <td>{{$d->document_class->name}}</td>
                <td>{{$d->created_at}}</td>              
                <td>{{$d->sender}}</td>
                <td>{{$d->origin}}</td>
                <td>{{$d->subject}}</td>
                <td>{{$d->assign_user->name}}</td>
                <td class=" ">
                  @if($d->state_id == 1)
                  <a href="{{route('document.state.update', ['id'=> $d->id])}}" class="btn btn-warning text-white btn-sm  float-right align-center"  data-toggle="tooltip" data-placement="left" title="Distribute">
                  Distribute
                  </a>
                  @else
                  <button class="btn btn-success text-white btn-sm align-center  float-right" disabled="disabled">
                  Distributed
                  @endif
                </td>
                <td class="">
                    <div class="btn-group align-center" role="group" aria-label="Basic example">
                        <a href="{{route('document.details', ['document_no'=> $d->document_no])}}" class="btn btn-info text-white btn-sm  "  data-toggle="tooltip" data-placement="left" title="Edit">
                        <i class="fas fa-envelope-open"></i>
                        </a>
                        <a href="{{route('document.edit', ['id'=> $d->id])}}" class="btn btn-primary text-white btn-sm  "  data-toggle="tooltip" data-placement="left" title="Edit">
                        <i class="fas fa-pencil-alt"></i>   
                        </a>
                        <a href="{{route('document.edit', ['id'=> $d->id])}}" class="btn btn-danger text-white btn-sm "  data-toggle="tooltip" data-placement="left" title="Delete">
                        <i class="fas fa-trash-alt"></i>
                        </a>                
                    </div>
                </td>
            </tr>
          @endforeach
        </tbody>
        <tfoot>
            <tr class="text-center">
                <th>Class</th>
                <th>Document no</th>
                <th>Date Recieved</th>
                <th>Sender</th>
                <th>Origin</th>
                <th>Subject</th>
                <th>Assigned to</th>
                <th>State</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection