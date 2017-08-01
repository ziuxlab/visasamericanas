<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<meta name="author" content="Ziuxlab">
<meta name="robots" content="index, follow">
<meta name="keywords" content="@yield('keywords')">
<link rel="canonical" href="{{url()->current()}}">
<title>@yield('title') | Visas Americanas Colombia</title>
<meta name="description" content="@yield('description')">
<!-- Real Favicon Generator -->

<link rel="apple-touch-icon" sizes="120x120" href="{{url('favicons/apple-touch-icon.png')}}">
<link rel="icon" type="image/png" href="{{url('favicons/favicon-32x32.png')}}" sizes="32x32">
<link rel="icon" type="image/png" href="{{url('favicons/favicon-16x16.png')}}" sizes="16x16">
<link rel="manifest" href="{{url('favicons/manifest.json')}}">
<link rel="mask-icon" href="{{url('favicons/safari-pinned-tab.svg')}}" color="#5bbad5">
<meta name="theme-color" content="#ffffff">


<!-- precarga de url que se van a utilizar despues -->
<link rel="dns-prefetch" href="//fonts.googleapis.com">
<link rel="dns-prefetch" href="//fonts.gstatic.com">


<!-- Critical CSS -->
@yield('critical-css')

<!-- Carga de css -->
<script>
    !function(a){"use strict";var b=function(b,c,d){var g,e=a.document,f=e.createElement("link");if(c)g=c;else{var h=(e.body||e.getElementsByTagName("head")[0]).childNodes;g=h[h.length-1]}var i=e.styleSheets;f.rel="stylesheet",f.href=b,f.media="only x",g.parentNode.insertBefore(f,c?g:g.nextSibling);var j=function(a){for(var b=f.href,c=i.length;c--;)if(i[c].href===b)return a();setTimeout(function(){j(a)})};return f.onloadcssdefined=j,j(function(){f.media=d||"all"}),f};"undefined"!=typeof module?module.exports=b:a.loadCSS=b}("undefined"!=typeof global?global:this);
    loadCSS('{{ asset(mix('/css/app-home.css')) }}');
</script>

@yield('style')

<!-- CSS Print -->
<link rel="stylesheet" type="text/css" media="print" href="{{ asset(mix('/css/app-home.css')) }}">



<!-- Scripts -->
<script>
    window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    
    @yield('scripts_header')
</script>
<!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>-->
