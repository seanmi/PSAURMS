@extends('user.layouts.document')

@section('content')
<div class="offset-lg-1 col-lg-7  col-md-6  col-sm-12"><br><br>
@if(!empty($search_term))
    <h3>You searched for: "{{$search_term}}"({{$documents->count()}})</h3><br>
@endif()
<div class="row">
<div class="col-lg-12">
    <form action="{{route('documents.search')}}" method="GET" class="float-right">
    {{ csrf_field() }}
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search"  name="search" aria-label="Recipient's username">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit" id="button-addon2">Search</button>
        </div>
    </div>
    </form>
</div>
<div class="accordion col-lg-12" id="accordionExample">
    <div class="card">
      <div class="card-header bg-dark  m-0 p-0" id="headingOne">
          <button class="btn btn-link text-white" type="button" data-toggle="collapse" data-target="#{{$d->id}}" aria-expanded="true" aria-controls="">
            <strong class="h6">{{$d->document_no}} </strong>
          </button>
      </div>

      <div id="{{$d->id}}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
        <h4 class="h2 text-center bg-white pt-2">Metadata</h4>
        <div class="card-body pt-0 bg-white">
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
            <hr>
            <a class="btn btn-info d-block" href="{{asset($d->file)}}" target="blank">Preview Document</a>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection