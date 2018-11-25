<div class="col-lg-3 col-md-5 pb-2">
    <div class="row">
        <div  class="col-sm-12 pt-2">
            <h2 class="h4 text-center">Views</h2>
            <div class="card">
                <div class="list-group">
                     <a href="{{route('user.documents')}}" class="{{ request()->route()->getName() === 'document.create' ? ' active' : '' }} list-group-item list-group-item-action">New Document</a>
                     <a href="{{route('document.create')}}" class="{{ request()->route()->getName() === 'document.create' ? ' active' : '' }} list-group-item list-group-item-action">Assigned to me</a>
                     <a href="{{route('document.create')}}" class="{{ request()->route()->getName() === 'document.create' ? ' active' : '' }} list-group-item list-group-item-action">CC</a>
                </div>
            </div>
        </div>
    </div>
</div> 
