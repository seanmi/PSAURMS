<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('admin.layouts.header')
<body>
    <div id="app">
        
        @include('admin.layouts.nav')

        <main class="py-5">
           <div class=" ">
            <div class="row">
            @include('admin.document.views')
            @yield('content')              
            </div>
           </div>
        </main>
    </div>
    <div>
    </div>

    @include('admin.layouts.footer-script')

</body>
</html>
