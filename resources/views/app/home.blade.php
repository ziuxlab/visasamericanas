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
    <style>@charset 'UTF-8';@-ms-viewport{width:device-width}@font-face{font-family:FontAwesome;src:url(/fonts/fontawesome-webfont.eot?25a32416abee198dd821b0b17a198a8f);src:url(/fonts/fontawesome-webfont.eot?25a32416abee198dd821b0b17a198a8f?#iefix&v=4.6.3) format("embedded-opentype"),url(/fonts/fontawesome-webfont.woff2?e6cf7c6ec7c2d6f670ae9d762604cb0b) format("woff2"),url(/fonts/fontawesome-webfont.woff?c8ddf1e5e5bf3682bc7bebf30f394148) format("woff"),url(/fonts/fontawesome-webfont.ttf?1dc35d25e61d819a9c357074014867ab) format("truetype"),url(/fonts/fontawesome-webfont.svg?d7c639084f684d66a1bc66855d193ed8#fontawesomeregular) format("svg");font-weight:400;font-style:normal}html{font-family:sans-serif;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}body{margin:0}header,main,nav{display:block}a{background-color:transparent}img{border:0}button{color:inherit;font:inherit;margin:0}button{overflow:visible}button{text-transform:none}button{-webkit-appearance:button}button::-moz-focus-inner{border:0;padding:0}*,:after,:before{-webkit-box-sizing:border-box;box-sizing:border-box}html{font-size:10px}body{font-family:Raleway,sans-serif;font-size:14px;line-height:1.6;color:#636b6f;background-color:#f5f8fa}button{font-family:inherit;font-size:inherit;line-height:inherit}a{color:#3097d1;text-decoration:none}img{vertical-align:middle}.img-responsive{display:block;max-width:100%;height:auto}.text-right{text-align:right}.text-capitalize{text-transform:capitalize}.text-primary{color:#3097d1}.bg-primary{color:#fff;background-color:#3097d1}ul{margin-top:0;margin-bottom:11px}ul ul{margin-bottom:0}.col-lg-3,.col-sm-12,.col-sm-4,.col-sm-5,.col-sm-7,.col-xs-12,.col-xs-8{position:relative;min-height:1px;padding-left:15px;padding-right:15px}.col-xs-12,.col-xs-8{float:left}.col-xs-8{width:66.66666667%}.col-xs-12{width:100%}@media (min-width:768px){.col-sm-12,.col-sm-4,.col-sm-5,.col-sm-7{float:left}.col-sm-4{width:33.33333333%}.col-sm-5{width:41.66666667%}.col-sm-7{width:58.33333333%}.col-sm-12{width:100%}}.btn{display:inline-block;margin-bottom:0;font-weight:400;text-align:center;vertical-align:middle;-ms-touch-action:manipulation;touch-action:manipulation;background-image:none;border:1px solid transparent;white-space:nowrap;padding:6px 12px;font-size:14px;line-height:1.6;border-radius:4px}.btn-lg{padding:10px 16px;font-size:18px;line-height:1.3333333;border-radius:6px}.dropdown-menu{position:absolute;top:100%;left:0;z-index:1000;display:none;float:left;min-width:160px;padding:5px 0;margin:2px 0 0;list-style:none;font-size:14px;text-align:left;background-color:#fff;border:1px solid #ccc;border:1px solid rgba(0,0,0,.15);border-radius:4px;-webkit-box-shadow:0 6px 12px rgba(0,0,0,.175);box-shadow:0 6px 12px rgba(0,0,0,.175);background-clip:padding-box}.dropdown-menu>li>a{display:block;padding:3px 20px;clear:both;font-weight:400;line-height:1.6;color:#333;white-space:nowrap}.dropdown-menu-right{left:auto;right:0}.btn-group{position:relative;display:inline-block;vertical-align:middle}.btn-group>.btn{position:relative;float:left}.btn-group>.btn:first-child{margin-left:0}.visible-lg{display:none!important}@media (min-width:1200px){.col-lg-3{float:left}.col-lg-3{width:25%}.visible-lg{display:block!important}.hidden-lg{display:none!important}}body,html{height:100%}body{font-family:Source Sans Pro,Open Sans,Helvetica Neue,Helvetica,Arial,sans-serif;font-size:16px;color:#646464;background-color:#fcfcfc}a{color:#a02000}.text-primary{color:#a02000}.text-white{color:#fff}.bg-primary{background-color:#a02000}.bg-primary-dark{background-color:#142653}.bg-white{background-color:#fff}.btn{font-weight:600;border-radius:2px}.dropdown-menu{min-width:180px;padding:5px 0;border-color:#ddd;border-radius:2px;-webkit-box-shadow:0 10px 30px rgba(0,0,0,.05);box-shadow:0 10px 30px rgba(0,0,0,.05)}.dropdown-menu>li>a{padding:7px 12px}.img-responsive{width:100%}.fa{display:inline-block;font:14px/1 FontAwesome;font-size:inherit;text-rendering:auto;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.fa-envelope-o:before{content:"\F003"}.fa-star:before{content:"\F005"}.fa-twitter:before{content:"\F099"}.fa-facebook:before{content:"\F09A"}.fa-navicon:before{content:"\F0C9"}.fa-google-plus:before{content:"\F0D5"}.fa-youtube:before{content:"\F167"}.fa-instagram:before{content:"\F16D"}#page-loader{position:fixed;top:0;right:0;bottom:0;left:0;background-color:#fff;z-index:999998}#page-loader:after{position:absolute;top:50%;left:50%;display:block;margin-top:-30px;margin-left:-30px;width:60px;height:60px;background-color:#a02000;border-radius:100%;content:"";z-index:999999;-webkit-animation:.9s ease-in-out infinite page-loader;animation:.9s ease-in-out infinite page-loader}@-webkit-keyframes page-loader{0%{-webkit-transform:scale(0);transform:scale(0)}to{-webkit-transform:scale(1);transform:scale(1);opacity:0}}@keyframes page-loader{0%{-webkit-transform:scale(0);transform:scale(0)}to{-webkit-transform:scale(1);transform:scale(1);opacity:0}}#header-navbar{min-height:70px;background-color:#fff}#header-navbar:after,#header-navbar:before{content:" ";display:table}#header-navbar:after{clear:both}#page-container{margin:0 auto;width:100%;min-width:320px;background-color:#2f4781}#main-container{overflow-x:hidden}#main-container{background-color:#fcfcfc}.content-boxed{margin:0 auto;width:100%;max-width:1280px}.nav-header{margin:0;padding:0;list-style:none}.nav-header:after,.nav-header:before{content:" ";display:table}.nav-header:after{clear:both}.nav-header>li{margin-right:12px;float:left}.push-5-r{margin-right:5px!important}.push-5-l{margin-left:5px!important}.push-10{margin-bottom:10px!important}.push-10-t{margin-top:10px!important}.push-10-r{margin-right:10px!important}.push-15-t{margin-top:15px!important}.remove-padding{padding:0!important}.item{display:inline-block;width:60px;height:60px;text-align:center;font-size:28px;font-weight:300;line-height:60px}.item.item-circle{border-radius:50%}.overflow-hidden{overflow:hidden}.item-xs{display:inline-block;width:30px;height:30px;text-align:center;font-size:18px;font-weight:300;line-height:30px}.menu{height:10px}.menu a{padding:10px 15px}.menu>li{position:relative;margin:0 10px 0 0;float:left}.dropdown-menu>li>a{color:#fcfcfc}.flex-between{display:flex;justify-content:space-between}.flex-right{display:flex;justify-content:flex-end}.v-center{display:flex;align-items:center}@media screen and (max-width:576px){.text-xs-center{text-align:center}.flex-xs-center{display:flex;justify-content:center;align-items:center}}</style>
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
                 src="{{url('img/slider-1.jpg')}}" alt="">
        </div>
        <div>
            <img class="img-responsive"
                 src="{{url('img/slider-2.jpg')}}" alt="">
        </div>
        <div>
            <img class="img-responsive"
                 src="{{url('img/slider-3.jpg')}}" alt="">
        </div>
        <div>
            <img class="img-responsive"
                 src="{{url('img/slider-4.jpg')}}" alt="">
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
    <!--
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.10&appId=1805076963071720";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>-->
@stop