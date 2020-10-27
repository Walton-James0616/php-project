@extends('layouts.front')
@section('content')
<div class="donors-profile-top-bg overlay text-center wow fadeInUp" style="background-image: url({{asset('assets/images/'.$gs->bgimg)}}); visibility: visible; animation-name: fadeInUp;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>{{$user->name}}</h2>
                        <p>{{$lang->bg}} {{$user->category->cat_name}}</p>
                    </div>
                </div>
            </div>
        </div>

<div class="donors-profile-wrap wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="profile-description-box margin-bottom-30">
                            <h2 class="ut">{{$lang->dopd}}</h2>
                            <hr>
                            <p>{!!$user->description!!}</p>
                        </div>

        @if($user->special != null)
                        <div class="other-description-box margin-bottom-30">
                            <h2 class="ut">{{$lang->doo}}</h2>
                            <hr>
                            <div class="table-responsive" style="overflow: hidden;">
@php
    $specials = explode(',', $user->special);  
@endphp
<ul class="row">
    @foreach($specials as $special)
    <li class="col-md-6 col-sm-6">{{$special}}</li>

    @endforeach
</ul>
        
          
                            </div>
                        </div>
        @endif

                        <div class="other-description-box margin-bottom-30">
                            <h2 class="ut">{{$lang->binfo}}</h2>
                            <hr>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th>{{$lang->doe}}</th>
                                        <td>{{$user->education}}</td>
                                    </tr>
                                    <tr>
                                        <th>{{$lang->dol}}</th>
                                        <td>{{$user->language}}</td>
                                    </tr>
{{--                                    <tr>--}}
{{--                                        <th>{{$lang->doa}}</th>--}}
{{--                                        <td>{{$user->age}}</td>--}}
{{--                                    </tr>--}}
                                    
{{--                                    <tr>--}}
{{--                                        <th>{{$lang->dor}}</th>--}}
{{--                                        <td>{{$user->residency}}</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <th>{{$lang->dopr}}</th>--}}
{{--                                        <td>{{$user->profession}}</td>--}}
{{--                                    </tr>--}}

                                    @if($user->title!=null && $user->details!=null && count($title) == count($details))

                                      @foreach(array_combine($title,$details) as $ttl => $dtl)
                                            <tr>
                                                <th>{{$ttl}}</th>
                                                <td>{{$dtl}}</td>
                                            </tr>
                                      @endforeach
                                    @endif                                    
                                </tbody></table>
                            </div>
                        </div>


                        @if(!empty($ad728x90))
                        @if($ad728x90->type == "banner")
                        <div class="add-area margin-bottom-30">
                            <a href="{{route('front.ads',$ad728x90->id)}}">
                            <img src="{{  asset('assets/images/'.$ad728x90->photo) }}" alt="{{$ad728x90->alt}}">
                            </a>
                        </div>
                        @else
                            {!! $ad728x90->script !!}
                        @endif
                        @endif

                        <div class="profile-contact-area margin-bottom-30">
                            <h2>{{$lang->doc}}</h2>
                            <hr>
                             @include('includes.form-success')
                            <form action="{{route('front.user.submit')}}" method="POST">
                                <input type="hidden" name="to" value="{{$user->email}}">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="name">{{$lang->don}}</label>
                                    <input class="form-control" name="name" placeholder="" required="" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="email">{{$lang->doem}}</label>
                                    <input class="form-control" name="email" placeholder="" required="" type="email">
                                </div>
                                <div class="form-group">
                                    <label for="message">{{$lang->dom}}</label>
                                    <textarea name="message" class="form-control" id="message" rows="5" style="resize: vertical;" required=""></textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">{{$lang->sm}}</button>
                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="profile-right-side">
                            <div class="profile-img">
                                <img width="130px" height="90px" id="adminimg" src="{{ $user->photo ? asset('assets/images/'.$user->photo):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="" id="adminimg">
                            </div>

                            <div class="profile-contact-info">
                                <h2>{{$lang->doci}}</h2>
                                <hr>

                                <p><i class="fa fa-home fa-1x"></i>&nbsp;{{$user->address}}</p>
                                @if($user->fax != null)
                                <p><i class="fa fa-fax fa-1x"></i>&nbsp;{{$user->fax}}</p>
                                @endif
                                <p><i class="fa fa-phone fa-1x"></i>&nbsp;{{$user->phone}}</p>
                                <p><i class="fa fa-envelope fa-1x"></i>&nbsp;{{$user->email}}</p>
                                @if($user->web != null)
                                <p><i class="fa fa-globe fa-1x"></i>&nbsp;{{$user->web}}</p>
                                @endif
                            </div>

                            <div class="share-profile-info">
                                <h2>{{$lang->dosp}}</h2>
                                <hr>

                                <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                    <a class="a2a_dd" href=""></a>
                                    @if(!empty($user->f_url)) <a href="{{$user->f_url}}" target="_blank">
                                        <span class="a2a_svg a2a_s__default a2a_s_facebook" style="background-color: rgb(24, 119, 242);"><svg focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path fill="#FFF" d="M17.78 27.5V17.008h3.522l.527-4.09h-4.05v-2.61c0-1.182.33-1.99 2.023-1.99h2.166V4.66c-.375-.05-1.66-.16-3.155-.16-3.123 0-5.26 1.905-5.26 5.405v3.016h-3.53v4.09h3.53V27.5h4.223z"></path></svg></span><span class="a2a_label">Facebook</span>
                                    </a> @endif
                                    @if(!empty($user->t_url))<a href="{{$user->t_url}}" target="_blank">
                                        <span class="a2a_svg a2a_s__default a2a_s_twitter" style="background-color: rgb(85, 172, 238);"><svg focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path fill="#FFF" d="M28 8.557a9.913 9.913 0 0 1-2.828.775 4.93 4.93 0 0 0 2.166-2.725 9.738 9.738 0 0 1-3.13 1.194 4.92 4.92 0 0 0-3.593-1.55 4.924 4.924 0 0 0-4.794 6.049c-4.09-.21-7.72-2.17-10.15-5.15a4.942 4.942 0 0 0-.665 2.477c0 1.71.87 3.214 2.19 4.1a4.968 4.968 0 0 1-2.23-.616v.06c0 2.39 1.7 4.38 3.952 4.83-.414.115-.85.174-1.297.174-.318 0-.626-.03-.928-.086a4.935 4.935 0 0 0 4.6 3.42 9.893 9.893 0 0 1-6.114 2.107c-.398 0-.79-.023-1.175-.068a13.953 13.953 0 0 0 7.55 2.213c9.056 0 14.01-7.507 14.01-14.013 0-.213-.005-.426-.015-.637.96-.695 1.795-1.56 2.455-2.55z"></path></svg></span><span class="a2a_label">Twitter</span>
                                    </a>@endif
                                    @if(!empty($user->g_url))
                                    <a href="{{$user->g_url}}" target="_blank">
                                        <span class="a2a_svg a2a_s__default a2a_s_instagram" style="background-color: rgb(24, 119, 242);"><svg focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path fill="#fff" opacity=".25" d="M4.958 6.569h22.338V25.43H4.958z"></path><path d="M28.709 7.321a1.7 1.7 0 0 0-1.409-.752h-.077l-1.1.8-.082.06-9.952 7.271L5.961 7.3l-1-.733H4.7A1.7 1.7 0 0 0 3 8.273v15.454a1.676 1.676 0 0 0 .069.481A1.7 1.7 0 0 0 4.7 25.431h1.261V11.36l7.35 5.368 2.416 1.764.445.326 2.778-2.029 7.088-5.177v13.819H27.3a1.7 1.7 0 0 0 1.634-1.223 1.675 1.675 0 0 0 .066-.481V8.273a1.7 1.7 0 0 0-.291-.952z" fill="#fff"></path></svg></span><span class="a2a_label">Instagram</span>
                                    </a>
                                    @endif
                                    @if(!empty($user->l_url))
                                    <a href="{{$user->l_url}}" target="_blank">
                                        <span class="a2a_svg a2a_s__default a2a_s_linkedin" style="background-color: rgb(0, 123, 181);"><svg focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M6.227 12.61h4.19v13.48h-4.19V12.61zm2.095-6.7a2.43 2.43 0 0 1 0 4.86c-1.344 0-2.428-1.09-2.428-2.43s1.084-2.43 2.428-2.43m4.72 6.7h4.02v1.84h.058c.56-1.058 1.927-2.176 3.965-2.176 4.238 0 5.02 2.792 5.02 6.42v7.395h-4.183v-6.56c0-1.564-.03-3.574-2.178-3.574-2.18 0-2.514 1.7-2.514 3.46v6.668h-4.187V12.61z" fill="#FFF"></path></svg></span><span class="a2a_label">LinkedIn</span>
                                    </a>
                                    @endif
                                </div>
                                <script async src="https://static.addtoany.com/menu/page.js"></script>
                                <!-- AddToAny END -->
                            </div>

                        @if(!empty($ad300x250))
                        @if($ad300x250->type == "banner")
                        <br>
                        <div class="add-area margin-bottom-30">
                            <a href="{{route('front.ads',$ad300x250->id)}}">
                            <img src="{{  asset('assets/images/'.$ad300x250->photo) }}" alt="{{$ad300x250->alt}}">
                            </a>
                        </div>
                        @else
                            {!! $ad300x250->script !!}
                        @endif
                        @endif
                        <div class="add-area margin-bottom-30">
                          <iframe
                            width="340"
                            height="350"
                            frameborder="0" style="border:0"
                            src="https://www.google.com/maps/embed/v1/place?key={{$gs->map_key}}&q={{$user->address == null ? '@':$user->address}}" allowfullscreen>
                          </iframe>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
