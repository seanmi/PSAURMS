<div class="offset-lg-1 col-lg-2 col-md-5">
    <div class="row">
        <div  class="col-sm-12 pt-2">
            <h2 class="h4 text-center">Views</h2>
            <div class="card">
                <div class="list-group">
                     <a href="{{route('document.create')}}" class="{{ request()->route()->getName() === 'document.create' ? ' active' : '' }} list-group-item list-group-item-action">Create Document</a>
                     <a href="{{route('documents.pending')}}" class="{{ request()->route()->getName() === 'documents.pending' ? ' active' : ''  }} list-group-item list-group-item-action">Pending</a>
                     <a href="{{route('documents')}}" class="{{ request()->route()->getName() === 'documents' ? ' active' : '' || request()->route()->getName() === 'documents.search' ? ' active' : ''}} list-group-item list-group-item-action">All documents</a>
                     <a href="{{route('archive')}}" class="{{ request()->route()->getName() === 'archive' ? ' active' : '' }} list-group-item list-group-item-action">Archive</a>
                     <a href="{{route('departments')}}" class="{{ request()->route()->getName() === 'departments' ? ' active' : '' }} list-group-item list-group-item-action">Inventory</a>
                </div>
            </div>
        </div>
    </div>
</div> 
