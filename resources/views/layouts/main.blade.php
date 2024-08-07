<!doctype html>
<html lang="en">
@include('includes/head')
    
    <body>

        @include('includes/preloader')
    
        <main>
   
            @include('includes/navbar')
                
            @yield('content')

    
            @include('includes/footer')     
            @yield('content2')                                          
            @include('includes/footerjs')

    </body>
</html>
