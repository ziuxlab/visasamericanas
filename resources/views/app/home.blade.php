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
        </div>
        <div>
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
                        <div class="col-md-6 content ">
                            <div class="block bg-image overflow-hidden"
                                 style="background-image: url('https://d1sipoklioe7pi.cloudfront.net/wp-content/uploads/2014/09/primera.png');  background-position: center;">
                                <div class="block-content col-sm-4 col-xs-2"></div>
                                <div class="block-content col-sm-8 col-xs-10 block-content-full text-right ">
                                    <h2 class="h4">VISA</h2>
                                    <h2>PRIMERA VEZ</h2>
                                    <P class="font-w300">Conozca los costos, tiempo de tramitación, requisitos y como
                                                         aplicar.</P>
                                    <button class="btn btn-primary">MÁS INFORMACIÓN</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 content ">
                            <div class="block bg-image overflow-hidden"
                                 style="background-image: url('https://d1sipoklioe7pi.cloudfront.net/wp-content/uploads/2014/09/renovacion.png');">
                                <div class="block-content block-content-full col-sm-8 col-xs-10">
                                    <h2 class="h4">VISA</h2>
                                    <h2>RENOVACIÓN</h2>
                                    <P class="font-w300">Conozca como renovar la visa sin presentar entrevista, costos,
                                                         tiempo y requisitos.</P>
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
        <div class="row content flex-center flex-sm-column">
            <div class="col-sm-4 push-20 ">
                <div class="row flex-center flex-md-column flex-sm-row">
                    <div class="text-primary text-center push-5 push-5-t col-md-3 col-sm-12">
                        <i class="si fa-4x si-earphones-alt"></i>
                    </div>
                    <div class="col-md-9 col-sm-12 text-md-center">
                        <h3 class="text-primary-dark">Linea gratuita nacional</h3>
                        <h3 class="text-primary"><strong><a href="tel:018000413519">01 8000 413 519</a></strong></h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 push-20   ">
                <div class="row flex-center flex-md-column flex-sm-row">
                    <div class="text-primary text-center  push-5 push-5-t col-md-3 col-sm-12 ">
                        <i class="fa fa-5x fa-whatsapp"></i>
                    </div>
                    <div class="text-md-center col-md-9 col-sm-12">
                        <h3 class="text-primary-dark">Celular y whatsapp</h3>
                        <h3 class="text-primary"><strong><a href="tel:3207085420">(+57) 320-708-5420 </a><br><a
                                        href="tel:3508210080"> (+57) 350-821-0080</a></strong></h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-4  push-20 ">
                <div class="row flex-center flex-md-column flex-sm-row">
                    <div class="text-primary text-center push-5 push-5-t col-md-3 col-sm-12 ">
                        <i class="fa fa-5x fa-mobile-phone"></i>
                    </div>
                    <div class="col-md-9 col-sm-12 text-md-center">
                        <h3 class="text-primary-dark">Otras lineas celulares</h3>
                        <h3 class="text-primary"><strong><a href="tel:3225683594"> (+57) 322-568-3594</a></strong></h3>
                    </div>
                </div>
            </div>
        
        </div>
        <div class="content content-full">
            <div class="row push-15">
                <div class="col-sm-12 border-primary-dark-b">
                    <h4 class="text-primary-dark h2">Reciba más información:</h4>
                </div>
            
            </div>
            <div class="row  ">
                <div class="col-sm-3">
                    <div class="form-group ">
                        <label class="h5" for="">Nombre<span class="text-primary">*</span></label>
                        {!! Form::text('first_name', null, ['class' => 'input-lg form-control h4','placeholder'=>'Ingrese su nombre aquí']) !!}
                    </div>
                
                </div>
                <div class="col-sm-3">
                    <div class="form-group ">
                        <label class="h5" for="">Correo electrónico<span class="text-primary">*</span></label>
                        {!! Form::text('first_name', null, ['class' => 'input-lg form-control h4','placeholder'=>'Ingrese su correo electrónico aquí']) !!}
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group ">
                        <label class="h5" for="">Teléfono<span class="text-primary">*</span></label>
                        {!! Form::text('first_name', null, ['class' => 'input-lg form-control h4','placeholder'=>'Ingrese su número tefefónico aquí']) !!}
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group ">
                        <label class="h5" for="">Mensaje<span class="text-primary">*</span></label>
                        {!! Form::text('first_name', null, ['class' => 'input-lg form-control h4','placeholder'=>'Ingrese su mensaje o dudas aquí']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-center">
                    <button class="btn btn-lg btn-primary">ENVIAR MENSAJE</button>
                </div>
            </div>
        </div>
    
    </div>
    <div class="bg-image bg-primary"
         style="background-image: url('https://d1sipoklioe7pi.cloudfront.net/wp-content/uploads/2014/09/bg-testimonial.jpg')">
        <div class="content-boxed">
            <div class="row content">
                <div class="col-sm-12 text-center ">
                    <h2>Entérese porqué somos los mejores</h2>
                </div>
            </div>
            <div class="row content content-full">
                <div class="col-md-7 text-center ">
                    <div class="youtube-player" data-id="lWP82FXHozE"></div>
                </div>
                <div class="col-md-5 text-center ">
                    <h3 class="h3 font-w300">Nuestros clientes nos recomiendan</h3>
                    <div class="row push-20-t">
                        <div class="col-xs-6 flex-center-column">
                            <div class="text-center w-150">
                                <img src="{{url('img/approvedweb.png')}}" class="testimonial-approved"></img>
                                <img class="" width="120" height="120" src="{{url("img/carlos-alberto.jpg")}}" alt="">
                            </div>
                            <div class="h4 push-10-t font-w300">Carlos Alberto</div>
                            <div class="stars">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="push-5-t">
                                <p class="testimonio font-w300 text-justify">Realmente estoy agradecido, los
                                                                             recomendaría cuantas veces fuera sin
                                                                             pensarlo, son personas muy atentas en toda
                                                                             consulta, te llevan de […]</p>
                            </div>
                        </div>
                        <div class="col-xs-6 flex-center-column">
                            <div class="text-center w-150">
                                <img src="{{url('img/approvedweb.png')}}" class="testimonial-approved"></img>
                                <img class="" width="120" height="120" src="{{url("img/Camila-Gomez.jpg")}}" alt="">
                            </div>
                            <div class="h4 push-10-t font-w300">Camila Gomez</div>
                            <div class="stars">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="push-5-t"><p class="testimonio font-w300 text-justify">Excelente servicio, las
                                                                                               personas son súper
                                                                                               amables, las asesorías
                                                                                               fueron constantes y
                                                                                               estuvieron muy pendientes
                                                                                               y dedicados a cada uno
                                                                                               […]</p></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <button class="btn btn-primary">VER MÁS COMENTARIOS</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-boxed">
        <div class="row content">
            <div class="col-sm-12 text-center">
                <h3 class="h2 text-primary-dark">Publicaciones Recientes</h3>
            </div>
        </div>
        <div class="row content content-full js-slider-responsive" data-slider-num="4" data-slider-autoplay="true" data-slider-arrows="true">
            <div class="col-sm-3 col-xs-6">
                <img class="img-responsive" src="{{url('img/redes-sociales.jpg')}}" alt="">
                <div class="push-10-t text-muted">26 Julio. 2017</div>
                <p class="h4 font-w400">Sus redes sociales puedes ser revisadas para que le aprueben la visa</p>
            </div>
            <div class="">
                <img class="img-responsive" src="{{url('img/Plan-canitas-que-es-visa-para-mayores-80-280x150.jpg')}}" alt="">
                <div class="push-10-t text-muted">25 Julio. 2017</div>
                <p class="h4 font-w400">¿Qué es el plan canitas?</p>
            </div>
            <div class="col-sm-3 col-xs-6">
                <img class="img-responsive" src="{{url('img/RESTRICCIONES-equipaje-de-mano-equipos-electronicos-280x150.jpg')}}" alt="">
                <div class="push-10-t text-muted">20 Julio. 2017</div>
                <p class="h4 font-w400">Nuevas restricciones para el equipaje de mano en su viaje a EE. UU.</p>
            </div>
            <div class="col-sm-3 col-xs-6">
                <img class="img-responsive" src="{{url('img/Visa-solo-o-en-grupo-familiar-280x150.jpg')}}" alt="">
                <div class="push-10-t text-muted">18 Julio. 2017</div>
                <p class="h4 font-w400">Visa Americana: ¿es mejor solicitarla solo o en grupo familiar?</p>
            </div>
            <div class="col-sm-3 col-xs-6">
                <img class="img-responsive" src="{{url('img/tipos-de-visa-y-sus-diferencias-280x150.jpg')}}" alt="">
                <div class="push-10-t text-muted">13 Julio. 2017</div>
                <p class="h4 font-w400">Tipos de visa</p>
            </div>
            <div class="col-sm-3 col-xs-6">
                <img class="img-responsive" src="{{url('img/Lugares-para-conocer-en-Estados-Unidos-con-visa-aprobada-280x150.jpg')}}" alt="">
                <div class="push-10-t text-muted">10 Julio. 2017</div>
                <p class="h4 font-w400">Mágicos lugares que puede conocer en Estados Unidos con su Visa aprobada</p>
            </div>
            <div class="col-sm-3 col-xs-6">
                <img class="img-responsive" src="{{url('img/vigencia-y-buen-uso-VISA-280x150.jpg')}}" alt="">
                <div class="push-10-t text-muted">8 Julio. 2017</div>
                <p class="h4 font-w400">Vigencia y buen uso de la Visa Americana</p>
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
    <script>
        $('.js-slider-responsive').slick({
            dots: false,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            infinite: true,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded",
                function () {
                    var div, n,
                        v = document.getElementsByClassName("youtube-player");
                    for (n = 0; n < v.length; n++) {
                        div = document.createElement("div");
                        div.setAttribute("data-id", v[n].dataset.id);
                        div.innerHTML = labnolThumb(v[n].dataset.id);
                        div.onclick   = labnolIframe;
                        v[n].appendChild(div);
                    }
                });
        
        function labnolThumb(id) {
            var thumb = '<img src="https://i.ytimg.com/vi/ID/hqdefault.jpg">',
                play  = '<div class="play"></div>';
            return thumb.replace("ID", id) + play;
        }
        
        function labnolIframe() {
            var iframe = document.createElement("iframe");
            var embed  = "https://www.youtube.com/embed/ID?autoplay=1";
            iframe.setAttribute("src", embed.replace("ID", this.dataset.id));
            iframe.setAttribute("frameborder", "0");
            iframe.setAttribute("allowfullscreen", "1");
            this.parentNode.replaceChild(iframe, this);
        }
    </script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.10&appId=1805076963071720";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
@stop