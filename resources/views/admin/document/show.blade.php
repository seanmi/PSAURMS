@extends('admin.layouts.document')

@section('content')
<div class="offset-lg-1 col-lg-7  col-md-6  col-sm-12"><br><br>
<div class="row">
<div class="accordion col-lg-12" id="accordionExample">
    <div class="card">
      <div class="card-header bg-dark  m-0 p-0" id="headingOne">
          <button class="btn btn-link text-white" type="button" data-toggle="" data-target="#{{$d->id}}" aria-expanded="true" aria-controls="">
            <strong class="h6">{{$d->document_no}} </strong>
          </button>
      </div>

      <div id="{{$d->id}}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
        <h4 class="h2 text-center bg-white pt-2">Metadata</h4>
        <div class="card-body pt-0 bg-white">
            <form action="">
            <div class="form-group">
              <label class="label" for="exampleInputEmail1">Class</label>
              <input type="email" class="form-control form-control-sm" value ="{{$d->document_class->name}}" disabled>
            </div>
            <div class="form-group">
              <label class="label" for="exampleInputEmail1">Tracking No</label>
              <input type="email" class="form-control form-control-sm"  value ="{{$d->document_no}}" disabled>
            </div>
            <div class="form-group">
              <label class="label" for="exampleInputEmail1">Date Received</label>
              <input type="email" class="form-control form-control-sm"  value ="{{Carbon\Carbon::parse($d->created_at)->format('F j Y')}}" disabled>
            </div>
            <div class="form-group">
              <label class="label" for="exampleInputEmail1">Assigned To</label>
              <input type="email" class="form-control form-control-sm"  value ="{{$d->assign_user['name']}}" disabled>
            </div>
            <div class="form-group">
                        <label for="name">CC</label>
                        <select name ="" class="form-control form-control-sm" multiple="multiple">
                            @foreach($d->cc_users as $c)
                            <option value="" disabled>{{$c['name']}}</option>
                            @endforeach
                        </select>
              </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Subject</label>
              <input type="email" class="form-control form-control-sm" value ="{{$d->subject}}" disabled>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Sender</label>
              <input type="email" class="form-control form-control-sm"  value ="{{$d->sender}}" disabled>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Origin</label>
              <input type="email" class="form-control form-control-sm"  value ="{{$d->origin}}" disabled>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Retention Schedule</label>
              <input type="email" class="form-control form-control-sm"  value ="{{$d->retention->name}}" disabled>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Retention Date</label>
              <input type="email" class="form-control form-control-sm"  value ="{{Carbon\Carbon::parse($d->disposal_date)->format('F j Y')}}" disabled>
            </div>
            <hr>
            <a class="btn btn-info d-block" href="{{asset($d->file)}}" target="blank">Preview Document</a>
            <hr>
            <b>Seen by</b> <br>
            Addressee: <small class="text-secondary">{{$d->assign_user->name}} {{$d->read ==1 ? $d->assign_user->name + "- seen"  : "- Not yet"}} </small><br>
            CC:
            @foreach($d->cc_users as $cc)
              @if($cc->pivot->read ==1)
                <small class="text-secondary">{{$cc->name}} - seen </small> <br> 
              @else
              <small class="text-secondary">{{$cc->name}} - Not yet </small> <br>       
              @endif
            @endforeach
            </form>

        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection