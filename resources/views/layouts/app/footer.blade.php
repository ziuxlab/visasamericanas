<div class="content-boxed">
    <div class="col-sm-12 text-gray">
        <div class="col-md-6 push-10-t text-center">
            <img alt="logo travelongo colombia" class="logo img-responsive" src="{{asset('img/logo-naranja.svg')}}">
            <p class="push-15-t text-justify">
                Travel<span class="text-primary">on</span>go
                @lang('general.footer')
            </p>
            <p>@lang('general.follow-us'):</p>
            <div class="item-social">
                @if($Config->facebook <> null)
                    <a class="item-circle-small push-10-r item-circle bg-gray-lighter" href="{{$Config->facebook}}">
                        <i class="fa fa-facebook text-gray-dark"></i>
                    </a>
                @endif
                @if($Config->twitter <> null)
                    <a class="item-circle-small push-10-r bg-gray-lighter" href="{{$Config->twitter}}">
                        <i class="fa fa-twitter text-gray-dark"></i>
                    </a>
                @endif
                @if($Config->google <> null)
                    <a class="item-circle-small push-10-r bg-gray-lighter" href="{{$Config->google}}">
                        <i class="fa fa-google-plus text-gray-dark"></i>
                    </a>
                @endif
                @if($Config->youtube <> null)
                    <a class="item-circle-small push-10-r bg-gray-lighter" href="{{$Config->youtube}}">
                        <i class="fa fa-youtube text-gray-dark"></i>
                    </a>
                @endif
                @if($Config->instagram <> null)
                    <a class="item-circle-small  bg-gray-lighter" href="{{$Config->instagram}}">
                        <i class="fa fa-instagram text-gray-dark"></i>
                    </a>
                @endif
            </div>
        </div>
        <div class="col-md-2 col-sm-6 text-left  push-20-t">
            <p class="h3 text-white "> @lang('general.about')</p>
            <br>
            <ul class="list-unstyled">
                <li><a href="{{url(str_slug(trans('general.our-allies')))}}">@lang('general.our-allies')</a></li>
                <li>
                    <a href="{{url(str_slug(trans('general.sustainability-policy')))}}">@lang('general.sustainability-policy')</a>
                </li>
                <li><a href="{{url(str_slug(trans('general.join-us')))}}">@lang('general.join-us')</a></li>
                <li><a href="{{url(str_slug(trans('general.terms')))}}">@lang('general.terms')</a></li>
                <li><a href="" data-toggle="modal" data-target="#loginModal">@lang('cabecera.Login')</a></li>
                <li><a href="#" data-toggle="modal" data-target="#registerModal">@lang('cabecera.Register')</a></li>
            </ul>
        </div>
        <div class="col-md-4 col-sm-6 text-center push-20-t">
            <h4 class="h3 text-white font-w600">@lang('general.Questions')</h4>
            <span class="item push-20-t item-circle bg-gray-lighter">
            <i class="fa fa-phone text-gray-dark"></i>
        </span>
            <p class="push-20-t h3">{{$Config->phone}}</p>
            <p class="">
                {{$Config->email}}
                <br>
                {{$Config->address}}
            </p>
        </div>
    </div>
    
    <div class="">
        <div class="col-sm-12 border-white-op-t push-15-t content-mini content-mini-full ">
       
            <span class="text-white">
                Copyright © 2017 Travelongo Colombia All Rights Reserved.
            </span>
            
            <span class="text-white pull-right">
                Made with <i class="fa fa-heart text-city"></i> in Colombia by <a
                        href="http://ziuxlab.com">Ziuxlab.com</a>
            </span>
        
        
        </div>
    </div>
</div>

