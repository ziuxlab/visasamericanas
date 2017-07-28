<div class="bg-white">
    <div class="content-boxed ">
        <div class="col-sm-12 content content-full text-center">
            <h2 class="h2">@lang('general.Popular Tours')</h2>
            @if(App::isLocale('en'))
                <h4 class="h5 ">"For your convenience, we have compiled our most popular activities into several package options which may help you to more quickly organize your vacation experience in the Colombian coffee area" </h4>
            @else
                <h4 class="h5 ">"Para su conveniencia, hemos compilado las actividades más populares en diferentes opciones de paquetes las cuales podrán ayudarle a organizar más rapidamente sus experiencia vacacional in el eje cafetero colombiano" </h4>
            @endif
        </div>
    </div>
    <div class="content-boxed content content-full">
        <div class="row text-white text-center">
            @foreach($products->where('local',App::getLocale())->where('type',0)->random(count($products->where('local',App::getLocale())->where('type',0)) > 3 ? 3 : count($products->where('local',App::getLocale())->where('type',0))) as $package)
                <div class="col-md-4 col-sm-6 push-15">
                    <a class="block block-sombra block-rounded block-link-hover2"
                       href="{{url(trans('general.packages').'/'.$package->slug_url)}}">
                        <div class="bg-image "
                             style="background-image: url('{{asset(count($package->photos)>0 ? $package->photos->sortBy('order')->first()->img : 'img/banner/about-us.jpg')}}'); background-position-x: 50%;">
                            
                            <div class="mheight-150">
                                <div class=" ribbon ribbon-bookmark ribbon-primary ribbon-left">
                                    <div class="ribbon-box font-w600">
                                        {{$package->discount}}%
                                    </div>
                                </div>
                            </div>
                            <div class="block-content block-content-full text-center bg-black-op">
                                <div class="row ">
                                    <div class="col-sm-12 text-white">
                                        <h2 class="pull-left  font-w600 h5">{{$package->tittle}}</h2>
                                        <span class="pull-right  font-w600 h5"><i
                                                    class="fa fa-clock-o push-5-r"></i> {{$package->days}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-content block-content-mini">
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="text-justify">
                                        {{substr($package->short_description,0,100)}}...
                                    </p>
                                    <p class="btn push-20 btn-minw text-white btn-primary text-capitalize">@lang('general.view details')</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>


