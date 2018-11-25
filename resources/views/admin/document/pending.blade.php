@extends('admin.layouts.document')

@section('content')
<div class="offset-lg-1 col-lg-6  col-md-6  col-sm-12 " ><br><br>
  <div class="accordion" id="accordionExample">
  @if(count($documents) == 0)
    <div class="alert alert-secondary text-center" role="alert">
      No Recods Found!
    </div>
  @endif()
  @foreach($documents as $d)
    <div class="card">
      <div class="card-header bg-dark  m-0 p-0" id="headingOne">
          <button class="btn btn-link text-white" type="button" data-toggle="collapse" data-target="#{{$d->id}}" aria-expanded="true" aria-controls="">
            <strong class="h6">{{$d->document_no}} </strong>
          </button>
          <a href="{{route('document.edit', ['id'=> $d->id])}}" class="btn btn-danger text-white btn-sm  float-right m-2"  data-toggle="tooltip" data-placement="left" title="Delete">
            <i class="fas fa-trash-alt"></i>
            </a>
            <a href="{{route('document.edit', ['id'=> $d->id])}}" class="btn btn-primary text-white btn-sm  float-right m-2"  data-toggle="tooltip" data-placement="left" title="Edit">
            <i class="fas fa-pencil-alt"></i>   
            </a>
            @if($d->state_id == 1)
            <a href="{{route('document.state.update', ['id'=> $d->id])}}" class="btn btn-warning text-white btn-sm  float-right m-2"  data-toggle="tooltip" data-placement="left" title="Distribute">
            <i class="fas fa-share-square"></i>   
            </a>
            @else
            <button class="btn btn-success text-white btn-sm  float-right m-2" disabled="disabled">
            <i class="fas fa-share-square"></i></button>
            @endif
      </div>

      <div id="{{$d->id}}" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
        <h4 class="h2 text-center bg-white pt-2">Metadata</h4>
        <div class="card-body pt-0 bg-white">
            @if($d->state_id == 1)
            <a href="{{route('document.state.update', ['id' => $d->id])}}" class="btn btn-warning text-white btn-sm">Distribute</a><br><br>
            @else
            <button class="btn btn-success btn-sm" disabled="disabled">Distributed</button><br><br>
            @endif
            <form action="">
            <div class="form-group">
              <label class="label" for="exampleInputEmail1">Class</label>
              <input type="email" class="form-control" value ="{{$d->document_class->name}}" disabled>
            </div>
            <div class="form-group">
              <label class="label" for="exampleInputEmail1">Tracking No</label>
              <input type="email" class="form-control"  value ="{{$d->document_no}}" disabled>
            </div>
            <div class="form-group">
              <label class="label" for="exampleInputEmail1">Assigned To</label>
              <input type="email" class="form-control"  value ="{{$d->assign_user['name']}}" disabled>
            </div>
            <div class="form-group">
                        <label for="name">CC</label>
                        <select name ="" class="form-control" multiple="multiple">
                            @foreach($d->cc_users as $c)
                            <option value="" disabled>{{$c['name']}}</option>
                            @endforeach
                        </select>
              </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Subject</label>
              <input type="email" class="form-control" value ="{{$d->subject}}" disabled>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Sender</label>
              <input type="email" class="form-control"  value ="{{$d->sender}}" disabled>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Origin</label>
              <input type="email" class="form-control"  value ="{{$d->origin}}" disabled>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Retention Schedule</label>
              <input type="email" class="form-control"  value ="{{$d->retention->name}}" disabled>
            </div>
            <hr>
            <a class="btn btn-info d-block" href="{{asset($d->file)}}" target="blank">Preview Document</a>
            </form>
        </div>
      </div>
    </div>
  @endforeach
  {{$documents->links()}}
  </div>
</div>
@endsection