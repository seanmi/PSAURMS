@extends('user.layouts.document')

@section('content')
<div class="offset-lg-1 col-lg-7  col-md-6  col-sm-12">
<div class="row">
<div class="accordion col-lg-12 pb-5" id="accordionExample">
<h5 class="text-center">Assigned Document</h5>
@if($documents->count() == 0)
    <div class="alert alert-warning text-center">
      <span>No assigned documents</span>
    </div>
  @endif
  @foreach($documents as $d)
    <div class="card">
      <div class="card-header bg-dark  m-0 p-0" id="headingOne">
          <button class="btn btn-link text-white"  type="button" data-toggle="collapse" data-target="#{{$d->id}}" aria-expanded="true" aria-controls="">
            <strong class="h6">{{$d->document_no}} </strong>
          </button>
            <a href="{{route('user.document.details', ['document_no' => $d->document_no])}}" class="btn btn-info   float-right m-1 mr-2"  data-toggle="tooltip" data-placement="left" title="Delete">
            <i class="fas fa-envelope-open"></i>
            </a>
      </div>

      <div id="{{$d->id}}" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
        <h4 class="h2 text-center bg-white pt-2">Metadata</h4>
        <div class="card-body pt-0 bg-white">
            <form action="">
            <div class="form-group">
              <label class="label" for="exampleInputEmail1">Date Received</label>
              <input type="email" class="form-control" value ="{{ \Carbon\Carbon::parse($d->created_at)->format('d/m/Y')}}" disabled>
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
              <label for="exampleInputEmail1">Subject</label>
              <input type="email" class="form-control"  value ="{{$d->subject}}" disabled>
            </div>
            <hr>
            <a class="btn btn-info d-block" href="{{route('user.document.details', ['document_no' => $d->document_no])}}" ><span> <i class="fas fa-envelope-open"></i></span> Details</a>
            </form>
        </div>
      </div>
    </div>
  @endforeach
  {{ $documents->appends(request()->except('page'))->links() }}
  </div>
  <!-- CC users -->
  
  <div class="accordion col-lg-12 pt-5" id="accordionExample">
  <h5 class="text-center">CC Document</h5>
  @if($cc_documents->count() == 0)
    <div class="alert alert-warning text-center">
      <span>No CC documents</span>
    </div>
  @endif
  @foreach($cc_documents as $d)
    <div class="card">
      <div class="card-header bg-dark  m-0 p-0" id="headingOne">
          <button class="btn btn-link text-white"  type="button" data-toggle="collapse" data-target="#{{$d->id}}" aria-expanded="true" aria-controls="">
            <strong class="h6">{{$d->document_no}} </strong>
          </button>
            <a href="{{route('user.document.details', ['document_no' => $d->document_no])}}" class="btn btn-info   float-right m-1 mr-2"  data-toggle="tooltip" data-placement="left" title="Delete">
            <i class="fas fa-envelope-open"></i>
            </a>
      </div>

      <div id="{{$d->id}}" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
        <h4 class="h2 text-center bg-white pt-2">Metadata</h4>
        <div class="card-body pt-0 bg-white">
            <form action="">
            <div class="form-group">
              <label class="label" for="exampleInputEmail1">Date Received</label>
              <input type="email" class="form-control" value ="{{ \Carbon\Carbon::parse($d->created_at)->format('d/m/Y')}}" disabled>
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
              <label for="exampleInputEmail1">Subject</label>
              <input type="email" class="form-control"  value ="{{$d->subject}}" disabled>
            </div>
            <hr>
            <a class="btn btn-info d-block" href="{{route('user.document.details', ['document_no' => $d->document_no])}}" target="blank"><span> <i class="fas fa-envelope-open"></i></span> Details</a>
            </form>
        </div>
      </div>
    </div>
  @endforeach
  {{ $documents->appends(request()->except('page'))->links() }}
  </div>
  <!--  -->
</div>
</div>
@endsection