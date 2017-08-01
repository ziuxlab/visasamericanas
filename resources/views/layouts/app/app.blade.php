<!DOCTYPE html>
<html lang="{{ session('locale') ?: config('app.locale') }}">
<head>
    @include('layouts.app.head')

</head>
<body>
<div id="page-container">
    
    
    <!-- Header -->
    
        @include('layouts.app.cabecera')
   
    <!-- END Header -->
    <!-- Main Container -->
    <main id="main-container">
        <div id="page-loader"></div>
        @yield('contenido')
    </main>
    <!-- END Main Container -->
    
    <!-- Footer -->
    <footer id="page-footer" class="bg-primary">
        @include('layouts.app.footer')
    </footer>
    <!-- END Footer -->
</div>

<!-- Scripts -->
@include('layouts.app.scripts')
</body>
</html>
