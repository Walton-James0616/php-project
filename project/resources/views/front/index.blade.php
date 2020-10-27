@extends('layouts.front')
@section('styles')
<style type="text/css">
    /* Hide the list on focus of the input field */
datalist {
    display: none;
}
/* specifically hide the arrow on focus */
input::-webkit-calendar-picker-indicator {
    display: none;
}

</style>
@endsection
@section('content')
       <div class="hero-area overlay" style="background-image: url({{asset('assets/images/'.$gs->bgimg)}});">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-lg-push-6 col-md-6 col-md-push-6 col-sm-6 col-sm-push-6 col-xs-12 col-xs-push-0">
                        <div class="hero-form">
                            <div class="hero-form-header">
                                <h3>{{$lang->ss}}</h3>
                                <hr>
                            </div>
                            <div class="hero-form-wrapper">
                                <form action="{{route('user.search')}}" method="GET">

                                    <div class="form-group">
                                        <div class="input-group">
                                          <div class="input-group-addon">
                                              <i class="fa fa-fw fa-home"></i>
                                          </div>
 
                                         <input list="cities" type="search" name="search" id="country" class="form-control" placeholder="{{$lang->ec}}" required=""
                                         style="">

                                        <datalist id="cities">
                                    @if($cities != null)
                                    @foreach($cities as $city)
                                          <option value="{{$city}}">
                                    @endforeach
                                    @endif
                                        </datalist> 
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <div class="input-group">
                                          <div class="input-group-addon">
                                              <i class="fa fa-fw fa-cog"></i>
                                          </div>
                                          <select name="group" id="blood_grp" class="form-control" required>
                                              <option value="">{{$lang->sbg}}</option>
                                            @foreach($cats as $cat)
                                              <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                            @endforeach
                                          </select>
                                        </div>
                                      </div>
                                      <div class="form-group text-center">
                                            <input type="submit" class="btn btn-block hero-btn" name="button" value="{{$lang->search}}">
                                      </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-lg-pull-6 col-md-6 col-md-pull-6 col-sm-6 col-sm-pull-6 col-xs-12 col-xs-pull-0">
                        <h1>{{$gs->bg_title}}</h1>
                        <p>{{$gs->bg_text}}</p>
                        <a href="{{$gs->bg_link}}" class="hero-btn">{{$lang->vd}}</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ending of Hero area -->


        <!-- Starting of All - sectors area -->
        <div class="section-padding all-sectors-wrap wow fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title pb_50 text-center">
                            <h2>{{$lang->bgs}}</h2>

                            <div class="section-borders">
                                <span></span>
                                <span class="black-border"></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                        @foreach($cats as $cat)
							<style type="text/css">
                                .single-campaignCategories-area span img{
                                    background-color: {{$cat->colors}};
                                    padding: 30px;
                                    border-radius: 50%;
                                    display: block;
                                }
                                .single-campaignCategories-area span img:hover{
                                    border:5px solid #fff;
                                    transition: border 1s;
                                }

							{{--.change{{$cat->id}} span:before {--}}
							{{--    background: {{$cat->colors}};--}}
							{{--}--}}
							{{--.change{{$cat->id}} span:after {--}}
							{{--    border: 2px solid {{$cat->colors}};--}}
							{{--}--}}
							</style>
                    <div class="col-md-3 col-sm-4 col-xs-6">
                        <a href="{{route('front.types',$cat->cat_slug)}}">
                            <div class="single-campaignCategories-area change{{$cat->id}} text-center">
                            <span><img src="{{asset('assets/images/'.$cat->photo)}}" alt="Category"></span>
                            <h4>{{$cat->cat_name}}</h4>
                        </div>
                        </a>
                    </div>
                    @endforeach
                                        
                </div>
            </div>
        </div>
        <!-- Ending of All - sectors area -->

        <!-- Starting of Team area -->
        <section class="section-padding team_section team_style2 wow fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title pb_50 text-center">
                            <h2>{{$lang->rds}}</h2>

                            <div class="section-borders">
                                <span></span>
                                <span class="black-border"></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach($rusers as $ruser)
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="team_common">
                            <div class="member_img img-responsive">
                                <a href="{{route('front.user',$ruser->id)}}"><img src="{{ $ruser->photo ? asset('assets/images/'.$ruser->photo):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="member image"></a>
                            </div>
                            <div class="member_info text-center pos_relative">
                                <div class="overlay1"></div>
                                <div class="overlay2"></div>
                                <div class="content">
                                    <a href="{{route('front.user',$ruser->id)}}" class="d_inline fw_600">{{$ruser->name}}</a>
                                    <span class="d_block transition_3s">{{$lang->bg}} {{$ruser->category->cat_name}}</span>
                                    <ul class="social_contact pt_10" style="padding-left: 0px;">
                                        @if($ruser->f_url != null)
                                    	@php
                                    		$url = parse_url('https://example.org');
											if($url['scheme'] == 'https'){
											   // is https;
											}
                                    	@endphp
                                        <li>
                                        <a href="{{$ruser->f_url ? $ruser->f_url:'https://www.facebook.com/'}}" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        @endif
                                        @if($ruser->t_url != null)
                                        <li>
                                        <a href="{{$ruser->t_url ? $ruser->t_url:'https://twitter.com/'}}" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        @endif
                                        @if($ruser->l_url != null)
                                        <li>
                                        <a href="{{$ruser->l_url ? $ruser->l_url:'https://www.linkedin.com/'}}" title="linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
                                        </li>
                                        @endif
                                        @if($ruser->g_url != null)
                                        <li>
                                        <a href="{{$ruser->g_url ? $ruser->g_url:'https://www.instagram.com/'}}" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!--member-2-->

                </div>
                <div class="text-center">
                    <a href="{{route('front.featured')}}" class="boxed-btn blog">{{$lang->vdn}}</a>
                </div>
            </div>
        </section>
        <!-- Ending of Team area -->
    
        <!-- Starting of Testimonial Area -->
        <div class="section-padding testimonial-wrapper mb_50 overlay" style="background-image: url({{asset('assets/images/'.$gs->bgimg)}});">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title pb_50 text-center">
                            <h2>{{$lang->hcs}}</h2>

                            <div class="section-borders">
                                <span></span>
                                <span class="black-border"></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel t_carousel10">
                            @foreach($ads as $ad)
                            <div class="single_testimonial text-center">
                                <div class="border_extra mb_50 pos_relative">
                                    <div class="author_info">
                                        <h4>{{$ad->client}}</h4>
                                        <span>{{$ad->designation}}</span>
                                        <p class="author_comment color_66">{{$ad->review}}</p>
                                    </div>
                                </div>
                                <div class="author_img radius_100p pos_relative"><img src="{{asset('assets/images/'.$ad->photo)}}" class="radius_100p" alt="author"></div>
                            </div>                        
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ending of Testimonial Area -->

        <!-- Starting of blog area -->
        <div class="section-padding blog-area-wrapper wow fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title pb_50 text-center">
                            <h2>{{$lang->lns}}</h2>

                            <div class="section-borders">
                                <span></span>
                                <span class="black-border"></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                     <div class="col-md-12">
                         <div class="owl-carousel blog-area-slider">
                            @foreach($lblogs as $lblog)
                             <a href="{{route('front.blogshow',$lblog->id)}}" class="single-blog-box">
                               <div class="blog-thumb-wrapper">
                                   <img src="{{asset('assets/images/'.$lblog->photo)}}" alt="Blog Image">
                               </div>
                                <div class="blog-text">
                                    <p class="blog-meta">{{date('d M, Y , H:i a',strtotime($lblog->created_at))}}
                                    </p>
                                    <h4>{{$lblog->title}}</h4>
                                    <p class="blog-meta-text">{{substr(strip_tags($lblog->details),0,250)}}</p>
                                    <span class="boxed-btn blog">{{$lang->vd}}</span>
                                </div>
                            </a>
                            @endforeach
                         </div>
                     </div>
                </div>
            </div>
        </div>
        <!-- Ending of blog area -->

@endsection