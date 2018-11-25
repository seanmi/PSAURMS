@if(Auth::user())
<div class="col-lg-3 col-md-5 pb-2">
    <div class="row">
        <div  class="col-sm-12 pt-2">
            <h2 class="h4 text-center">Views</h2>
            <div class="card">
                <div class="list-group">
                     <a href="{{route('class')}}" class="{{ request()->route()->getName() === 'class' ? ' active' : '' }} list-group-item list-group-item-action">Document Class</a>
                     <a href="{{route('users')}}" class="{{ request()->route()->getName() === 'users' ? ' active' : '' }} list-group-item list-group-item-action">Users</a>
                     <a href="{{route('departments')}}" class="{{ request()->route()->getName() === 'departments' ? ' active' : '' }} list-group-item list-group-item-action">Departments</a>
                     <a href="{{route('retentions')}}" class="{{ request()->route()->getName() === 'retentions' ? ' active' : '' }} list-group-item list-group-item-action">Retention Schedules</a>
                </div>
            </div>
        </div>
    </div>
</div> 
@endif
