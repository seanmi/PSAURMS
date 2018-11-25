<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('user.layouts.header')
<body>
    <div id="app">
        
        @include('user.layouts.nav')

        <main class="py-5">
           <div class="container ">
            <div class="row">
            @include('user.document.views')
            @yield('content')              
            </div>
           </div>
        </main> 
    </div>
    <div>
    </div>

    @include('user.layouts.footer-script')

</body>
</html>
