<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="{{$seo->meta_keys}}">
        <meta name="author" content="GeniusOcean">
        <title>{{$gs->title}}</title>

        <link href="{{ asset('assets/front/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/front/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/front/css/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/front/css/slicknav.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/front/css/animate.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
        <link href="{{ asset('assets/front/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/front/css/responsive.css') }}" rel="stylesheet">
        <link rel="icon" type="image/png" href="{{asset('assets/images/'.$gs->favicon)}}">
        @include('styles.design')
        @yield('styles')
    <style type="text/css">
        .profile-contact-info {
            margin-top: 15px;
        }
        .ut {
            font-size: 20px;
        }
    </style>
    @if(Auth::guard('user')->check())
<style type="text/css">
@media only screen and (min-width: 767px) { 
    .mid-break-9 {
        width: 85%;
    }
    .mid-break-3 {
        width: 15%;
    }

    }
@media only screen and (min-width: 991px) and (max-width: 1199px) { 
    .mid-break-9 {
        width: 87%;
    }
    .mid-break-3 {
        width: 13%;
    }

    }
.mainmenu li ul {
    width: 150px;
}
</style>
    @endif
    </head>
    <body>
    <div id="cover"></div>
        <!-- Starting of Header area -->
        <div class="header-top-area">
            <div class="container">

                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="top-column-left">
                            <ul>
                                <li>
                                    <i class="fa fa-envelope"></i> {{$gs->email}}
                                </li>
                                <li>
                                    <i class="fa fa-phone"></i> {{$gs->phone}}
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="top-column-right">
                            <ul class="top-social-links">
                                <li class="top-social-links-li">
                                    @if($sl->f_status == 1)
                                    <a href="{{$sl->facebook}}"><i class="fa fa-facebook"></i></a>
                                    @endif
                                    @if($sl->t_status == 1)
                                    <a href="{{$sl->twitter}}"><i class="fa fa-twitter"></i></a>
                                    @endif
                                    @if($sl->l_status == 1)
                                    <a href="{{$sl->linkedin}}"><i class="fa fa-linkedin"></i></a>
                                    @endif
                                    @if($sl->g_status == 1)
                                    <a href="{{$sl->gplus}}"><i class="fa fa-google"></i></a>
                                    @endif
                                </li>
                         @if(Auth::guard('user')->check())   
                         @else
                                <li><a href="{{route('user-login')}}">{{$lang->signin}}</a></li>
                                <li><a href="{{route('user-register')}}">{{$lang->signup}}</a></li>
                        @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-area-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 col-md-3 col-lg-3 mid-break-3">
                        <div class="logo">
                            <a href="{{route('front.index')}}">
                                <img src="{{asset('assets/images/'.$gs->logo)}}" alt="">
                            </a>
                        </div>
                        <div id="mobile-menu-wrap"></div>
                    </div>
                    <div class="col-sm-9 col-md-9 col-lg-9 mid-break-9">
                        <div class="mainmenu">

                            <ul id="menuResponsive">
                                <li><a href="{{route('front.index')}}">{{$lang->home}}</a></li>
                                <li><a href="{{route('front.featured')}}">{{$lang->fh}}</a></li>
                                <li><a href="{{route('front.users')}}">{{$lang->h}}</a></li>

                                @if($ps->a_status == 1)
                                <li><a href="{{route('front.about')}}">{{$lang->about}}</a></li>
                                @endif
                                <li><a href="{{route('front.blog')}}">{{$lang->blog}}</a></li>
                                @if($ps->f_status == 1)
                                <li><a href="{{route('front.faq')}}">{{$lang->faq}}</a></li>
                                @endif
                                @if($ps->c_status == 1)
                                <li><a href="{{route('front.contact')}}">{{$lang->contact}}</a></li>
                                @endif
                         @if(Auth::guard('user')->check())  


                                <li class="menuLi"><a style="cursor: pointer;">PROFILE <i class="fa fa-angle-down"></i></a>
                                    <ul class="menuUl">
                                        <li><a href="{{route('user-dashboard')}}">{{$lang->dashboard}}</a></li>
                                        <li><a href="{{route('user-profile')}}">{{$lang->edit}}</a></li>
                                        <li><a href="{{route('user-reset')}}">{{$lang->reset}}</a></li>
                                        <li><a href="{{route('user-logout')}}">{{$lang->logout}}</a></li>
                                    </ul>
                                </li>                             
                         @endif
                            </ul>
 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ending of Header area -->

        <!-- Starting of Hero area -->
        @yield('content')

        <!-- starting of subscribe newsletter area -->
        <div class="subscribe-newsletter-wrapper">
            <div class="container"> 
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="subscribe-newsletter-area">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                    <h4>{{$lang->ston}}</h4>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                                    <form action="{{route('front.subscribe.submit')}}" method="POST">
                                        {{csrf_field()}}
                                        <input type="email" name="email" placeholder="{{$lang->supl}}" required>
                                        <button type="submit" class="btn">{{$lang->s}}</button>
                                    </form>
                                    <p>
                                    @if(Session::has('subscribe'))
                                        {{ Session::get('subscribe') }}
                                    @endif
                                    @foreach($errors->all() as $error)
                                        {{$error}}
                                    @endforeach
                                </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ending of subscribe newsletter area -->
        <!-- starting of footer area -->
        <footer class="section-padding footer-area-wrapper wow fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="single-footer-area">
                            <div class="footer-title">{{$lang->about}}</div>
                            <div class="footer-content">
                                <p>
                                    <?php  
                                        echo isset($gs->about) ? $gs->about:'';
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="single-footer-area">
                            <div class="footer-title">{{$lang->fl}}</div>
                            <div class="footer-content">
                                <ul class="about-footer">
                                    <li><a href="{{route('front.index')}}"><i class="fa fa-caret-right"></i> &nbsp;{{$lang->home}}</a></li>
                                @if($ps->a_status == 1)
                                    <li><a href="{{route('front.about')}}"><i class="fa fa-caret-right"></i> &nbsp;{{$lang->about}}</a></li>
                                @endif
                                @if($ps->f_status == 1)
                                    <li><a href="{{route('front.faq')}}"><i class="fa fa-caret-right"></i> &nbsp;{{$lang->faq}}</a></li>
                                @endif
                                @if($ps->c_status == 1)
                                    <li><a href="{{route('front.contact')}}"><i class="fa fa-caret-right"></i> &nbsp;{{$lang->contact}}</a></li>
                                @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="single-footer-area">
                            <div class="footer-title">{{$lang->lns}}</div>
                            <div class="footer-content">
                                <ul class="latest-tweet">
                                    @foreach($lblogs as $lblog)
                                    <li>
                                        <img src="{{asset('assets/images/'.$lblog->photo)}}" alt="">
                                        <span><a href="{{route('front.blogshow',$lblog->id)}}">{{$lblog->title}}</a></span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-5 col-sm-6 col-xs-12">
                        <div class="single-footer-area">
                            <div class="footer-title">{{$lang->contact}}</div>
                            <div class="footer-content">
                                <div class="contact-info">
                                @if($gs->street != null)                                    
                                  <p class="contact-info">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        {{$gs->street}}
                                    </p>
                                @endif
                                @if($gs->phone != null)   
                                    <p class="contact-info">
                                         <i class="fa fa-phone" aria-hidden="true"></i>
                                        <a href="tel:{{$gs->phone}}">{{$gs->phone}}</a>
                                    </p>
                                @endif
                                @if($gs->email != null)   
                                    <p class="contact-info">
                                         <i class="fa fa-envelope" aria-hidden="true"></i>
                                        <a href="mailto:{{$gs->email}}">{{$gs->email}}</a>
                                    </p>
                                @endif
                                @if($gs->site != null)   
                                    <p class="contact-info">
                                        <i class="fa fa-globe" aria-hidden="true"></i>
                                        <a href="{{$gs->site}}">{{$gs->site}}</a>
                                    </p>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="footer-copyright-area">
              <div class="container">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6">
                      <p class="copy-right-side">
                        {!!$gs->footer!!}
                      </p>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="footer-social-links">
                        <ul>
                            @if($sl->f_status == 1)
                            <li><a class="facebook" href="{{$sl->facebook}}">
                                <i class="fa fa-facebook"></i>
                            </a></li>
                            @endif
                            @if($sl->g_status == 1)
                            <li><a class="google" href="{{$sl->gplus}}">
                                <i class="fa fa-google"></i>
                            </a></li>
                            @endif
                            @if($sl->t_status == 1)
                            <li><a class="twitter" href="{{$sl->twitter}}">
                                <i class="fa fa-twitter"></i>
                            </a></li>
                            @endif
                            @if($sl->l_status == 1)
                            <li><a class="tumblr" href="{{$sl->linkedin}}">
                                <i class="fa fa-linkedin"></i>
                            </a></li>
                            @endif
                        </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </footer>
        <!-- Ending of footer area -->


        

        <script src="{{ asset('assets/front/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/front/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/front/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/front/js/wow.js') }}"></script>
        <script src="{{ asset('assets/front/js/jquery.slicknav.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script>
        <script src="{{ asset('assets/front/js/main.js') }}"></script>
        {!! $seo->google_analytics !!}
        <script type="text/javascript">
        $(window).load(function(){
            setTimeout(function(){
                $('#cover').fadeOut(1000);
            },1000)
        });
        </script>

        @yield('scripts')

    </body>
</html>
