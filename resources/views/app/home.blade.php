@extends('layouts.app.app')

@section('title')
    {{$item->tittle or $Config->tittle}}
@stop

@section('keywords')
    {{$item->keywords or $Config->keywords}}
@stop

@section('description')
    {{$item->meta_description or $Config->meta_description}}
@stop

@section('critical-css')

@endsection

@section('style')
    <!--
    <script>
        !function(a){"use strict";var b=function(b,c,d){var g,e=a.document,f=e.createElement("link");if(c)g=c;else{var h=(e.body||e.getElementsByTagName("head")[0]).childNodes;g=h[h.length-1]}var i=e.styleSheets;f.rel="stylesheet",f.href=b,f.media="only x",g.parentNode.insertBefore(f,c?g:g.nextSibling);var j=function(a){for(var b=f.href,c=i.length;c--;)if(i[c].href===b)return a();setTimeout(function(){j(a)})};return f.onloadcssdefined=j,j(function(){f.media=d||"all"}),f};"undefined"!=typeof module?module.exports=b:a.loadCSS=b}("undefined"!=typeof global?global:this);
        loadCSS('{{asset('css')}}');
    </script>-->
@stop



@section('breadcrumb')
@stop

@section('contenido')
    <div class="js-slider" data-slider-autoplay="true" data-slider-arrows="true">
        <div>
            <img class="img-responsive"
                 src="https://d1sipoklioe7pi.cloudfront.net/wp-content/uploads/2017/05/primer.jpg" alt="">
        </div><div>
            <img class="img-responsive"
                 src="https://d1sipoklioe7pi.cloudfront.net/wp-content/uploads/2017/04/Slide2.jpg" alt="">
        </div>
        <div>
            <img class="img-responsive"
                 src="https://d1sipoklioe7pi.cloudfront.net/wp-content/uploads/2017/05/Slide3_2.jpg" alt="">
        </div>
        <div>
            <img class="img-responsive"
                 src="https://d1sipoklioe7pi.cloudfront.net/wp-content/uploads/2017/04/Slide4.jpg" alt="">
        </div>
    </div>
    <div class="bg-primary">
        <div class="content-boxed">
            <div class="row">
                <div class="col-sm-12 content content-full ">
                    <h2 class="text-center h2">Conozca cómo realizar el trámite para:</h2>
                    <div class=" overflow-hidden">
                        <div class="col-md-6 content " >
                            <div class="block bg-image overflow-hidden" style="background-image: url('https://d1sipoklioe7pi.cloudfront.net/wp-content/uploads/2014/09/primera.png');  background-position: center;">
                                <div class="block-content col-sm-4 col-xs-2"></div>
                                <div class="block-content col-sm-8 col-xs-10 block-content-full text-right ">
                                    <h2 class="h4">VISA</h2>
                                    <h2>PRIMERA VEZ</h2>
                                    <P class="font-w300">Conozca los costos, tiempo de tramitación, requisitos y como aplicar.</P>
                                <button class="btn btn-primary">MÁS INFORMACIÓN</button>
                                    </div>
                            </div>
                        </div>
                        <div class="col-md-6 content " >
                            <div class="block bg-image overflow-hidden" style="background-image: url('https://d1sipoklioe7pi.cloudfront.net/wp-content/uploads/2014/09/renovacion.png');">
                                <div class="block-content block-content-full col-sm-8 col-xs-10">
                                    <h2 class="h4">VISA</h2>
                                    <h2>RENOVACIÓN</h2>
                                    <P class="font-w300">Conozca como renovar la visa sin presentar entrevista, costos, tiempo y requisitos.</P>
                                    <button class="btn btn-primary">MÁS INFORMACIÓN</button>
                                </div>
                                <div class="block-content col-sm-4 col-xs-2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-boxed">
        <div class="row content flex-center">
            <div class="col-sm-4 flex-center content content-full">
                <div class="text-primary push-20-r">
                    <i class="si fa-5x si-earphones-alt"></i>
                </div>
                <div class="">
                    <h3 class="text-primary-dark">Linea gratuita nacional</h3>
                    <h3 class="text-primary"><strong><a href="tel:018000413519">01 8000 413 519</a></strong></h3>
                </div>
            </div>
            <div class="col-sm-4 flex-center content content-full">
                <div class="text-primary push-20-r">
                    <i class="fa fa-5x fa-whatsapp"></i>
                </div>
                <div class="">
                    <h3 class="text-primary-dark">Linea gratuita nacional</h3>
                    <h3 class="text-primary"><strong><a href="tel:3207085420">(+57) 320 708 54 20 </a><br><a href="tel:3508210080"> (+57) 350 821 00 80</a></strong></h3>
                </div>
            </div>
            <div class="col-sm-4 flex-center content-mini content-mini-full">
                <div class="text-primary push-20-r">
                    <i class="fa fa-5x fa-mobile-phone"></i>
                </div>
                <div class="">
                    <h3 class="text-primary-dark">Otras lineas celulares</h3>
                    <h3 class="text-primary"><strong><a href="tel:3225683594"> (+57) 322 568 35 94</a></strong></h3>
                </div>
            </div>

        </div>
        <div class="row content">
            <div class="col-sm-12 border-b">
                <h4 class="text-primary-dark h2">Reciba más información:</h4>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(function () {
            App.initHelper('slick');
        });
    </script>
@stop