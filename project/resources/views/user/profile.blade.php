@extends('layouts.front')

@section('styles')

    <link href="{{asset('assets/admin/css/jquery.tagit.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/admin/css/jquery-ui.css')}}" rel="stylesheet" type="text/css">
    <style>
        .bootstrap-select .btn.dropdown-toggle{
            padding: 9px 12px;
        }
    </style>

@endsection

@section('content')
    <div class="donors-profile-top-bg overlay text-center wow fadeInUp"
         style="background-image: url({{asset('assets/images/'.$gs->bgimg)}}); visibility: visible; animation-name: fadeInUp;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{$user->name}}</h2>
                    <p>{{$lang->bg}} {{$user->category->cat_name}}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="profile-fillup-wrap wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal" action="{{route('user-profile-update',$user->id)}}" method="POST"
                          enctype="multipart/form-data">
                        @include('includes.form-success')
                        @include('includes.form-error')
                        {{csrf_field()}}
                        <div class="profile-filup-description-box margin-bottom-30">
                            <div class="form-group">
                                <label for="full_name" class="col-sm-3 control-label">{{$lang->fname}}*</label>
                                <div class="col-sm-8">
                                    <input class="form-control" id="full_name" name="name"
                                           placeholder="{{$lang->fname}}" type="text" value="{{$user->name}}"
                                           required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="category_id" class="col-sm-3 control-label">Categories*</label>
                                @php
                                    $categories = explode(',', $user->category_id);
                                @endphp
                                <div class="col-sm-8">
                                    <select name="category_id[]" id="category_id" data-style="btn-default" class="selectpicker form-control" multiple required>

                                        @foreach($cats as $cat)
                                            <option value="{{$cat->id}}"
                                                @foreach($categories as $category)
                                                    @if($cat->id == $category)
                                                        selected
                                                    @endif
                                                @endforeach
                                            >{{$cat->cat_name}}</option>
                                        @endforeach
                                    </select>

                                </div>

                            </div>
                            <div class="form-group">
                                <label for="current_photo" class="col-sm-3 control-label">{{$lang->cup}}*</label>
                                <div class="col-sm-8">

                                    <img width="130px" height="90px" id="adminimg"
                                         src="{{ $user->photo ? asset('assets/images/'.$user->photo):'http://fulldubai.com/SiteImages/noimage.png'}}"
                                         alt="" id="adminimg">

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="profile_photo" class="col-sm-3 control-label">{{$lang->pp}}*</label>
                                <div class="col-sm-8">
                                    <input type="file" id="uploadFile" class="hidden" name="photo" value="">
                                    <button type="button" id="uploadTrigger" onclick="uploadclick()"
                                            class="form-control"><i class="fa fa-download"></i> {{$lang->app}}</button>
                                    <p>{{$lang->size}}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="profile_description" class="col-sm-3 control-label">{{$lang->dopd}}*</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="description" id="profile_description" rows="5"
                                              style="resize: vertical;">{{$user->description}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="special" class="col-sm-3 control-label">{{$lang->doo}}* </label>
                            <div class="col-sm-8">
                                @if($user->special != null)

                                    @php
                                        $specials = explode(',', $user->special);
                                    @endphp
                                @endif
                                <ul id="myTags">
                                    @if(isset($specials))
                                        @foreach($specials as $parea)
                                            <li>{{$parea}}</li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>

                        <div class="profile-filup-description-box margin-bottom-30">
                            <h2 class="text-center">{{$lang->md}}</h2>
                            <div class="qualification" id="q">
                                @if($user->title!=null && $user->details!=null)
                                    @foreach(array_combine($title,$details) as $ttl => $dtl)
                                        <div class="qualification-area">
                                            <div class="form-group">
                                                <div class="col-xs-10 col-sm-5 col-md-offset-1">
                                                    <input class="form-control" name="title[]" id="title"
                                                           placeholder="{{$lang->dttl}}" type="text" value="{{$ttl}}">
                                                </div>
                                                <div class="col-xs-10 col-sm-5">
                                                    <input class="form-control" name="details[]" id="text_details"
                                                           placeholder="{{$lang->ddesc}}" type="text" value="{{$dtl}}">
                                                </div>
                                            </div>
                                            <span class="ui-close">X</span>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="qualification-area">
                                        <div class="form-group">
                                            <div class="col-xs-10 col-sm-5 col-md-offset-1">
                                                <input class="form-control" name="title[]" id="title"
                                                       placeholder="{{$lang->dttl}}" type="text" value="">
                                            </div>
                                            <div class="col-xs-10 col-sm-5">
                                                <input class="form-control" name="details[]" id="text_details"
                                                       placeholder="{{$lang->ddesc}}" type="text">
                                            </div>
                                        </div>
                                        <span class="ui-close" id="parentclose">X</span>
                                    </div>
                                @endif

                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for=""></label>
                                <div class="col-sm-12 text-center">
                                    <input type="hidden" id="tttl" value="{{$lang->dttl}}">
                                    <input type="hidden" id="dddc" value="{{$lang->ddesc}}">
                                    <button class="btn btn-default featured-btn" type="button" name="add-field-btn"
                                            id="add-field-btn"><i class="fa fa-plus"></i> {{$lang->amf}}</button>
                                </div>
                            </div>
                        </div>

                        <div class="profile-filup-description-box margin-bottom-30">

                            <div class="form-group">
                                <label for="edu" class="col-sm-3 control-label">{{$lang->doe}}*</label>
                                <div class="col-sm-8">
                                    <input class="form-control" name="education" id="edu" placeholder="{{$lang->doe}}"
                                           type="text" value="{{$user->education}}" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lang" class="col-sm-3 control-label">{{$lang->dol}}*</label>
                                <div class="col-sm-8">
                                    <input class="form-control" name="language" id="lang" placeholder="{{$lang->dol}}"
                                           type="text" value="{{$user->language}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="city" class="col-sm-3 control-label">{{$lang->doct}}*</label>
                                <div class="col-sm-8">
                                    <input class="form-control" name="city" id="city" placeholder="{{$lang->doct}}"
                                           type="text" value="{{$user->city}}" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address" class="col-sm-3 control-label">{{$lang->doad}}*</label>
                                <div class="col-sm-8">
                                    <input class="form-control" name="address" id="address"
                                           placeholder="{{$lang->doad}}" type="text" value="{{$user->address}}"
                                           required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-sm-3 control-label">{{$lang->doph}}*</label>
                                <div class="col-sm-8">
                                    <input class="form-control" name="phone" id="phone" placeholder="{{$lang->doph}}"
                                           type="text" value="{{$user->phone}}" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fax" class="col-sm-3 control-label">{{$lang->dofx}}*</label>
                                <div class="col-sm-8">
                                    <input class="form-control" name="fax" id="fax" placeholder="{{$lang->dofx}}"
                                           type="text" value="{{$user->fax}}">
                                </div>
                            </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-sm-10 text-danger">* For Facebook,Instagram,Twitter,Linkedin Profile link , Not write social website link e.g : <del>https://www.facebook.com/abcd</del></label>
                                            <label class="control-label col-sm-10 text-success">* write only your social profile username eg : abcd . function covert this https://www.facebook.com/abcd automatically</label>
                                        </div>
                            <div class="form-group">
                                <label for="fax" class="col-sm-3 control-label">{{$lang->dofpl}}*</label>
                                <div class="col-sm-8">
                                    <input class="form-control" name="f_url" id="ff" placeholder="{{$lang->dofpl}}"
                                           type="text" value="{{$user->f_url}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fax" class="col-sm-3 control-label">{{$lang->dotpl}}*</label>
                                <div class="col-sm-8">
                                    <input class="form-control" name="t_url" id="tt" placeholder="{{$lang->dotpl}}"
                                           type="text" value="{{$user->t_url}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fax" class="col-sm-3 control-label">Instagram Profile Link*</label>
                                <div class="col-sm-8">
                                    <input class="form-control" name="g_url" id="gg" placeholder="{{$lang->dogpl}}"
                                           type="text" value="{{$user->g_url}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fax" class="col-sm-3 control-label">{{$lang->dolpl}}*</label>
                                <div class="col-sm-8">
                                    <input class="form-control" name="l_url" id="lin" placeholder="{{$lang->dolpl}}"
                                           type="text" value="{{$user->l_url}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="web" class="col-sm-3 control-label">{{$lang->doeml}}*</label>
                                <div class="col-sm-8">
                                    <input class="form-control" name="web" id="web" placeholder="{{$lang->doeml}}"
                                           type="text" value="{{$user->web}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-3 control-label">Email*</label>
                                <div class="col-sm-8">
                                    <input class="form-control" name="email" id="email" placeholder="Email"
                                           type="text" value="{{$user->email}}">
                                </div>
                            </div>

                        </div>

                        <div class="submit-area margin-bottom-30">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="form-group text-center">
                                        <button class="boxed-btn blog" id="hak_user_submit_btn" type="submit">{{$lang->doupl}}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')


    <script type="text/javascript" src="{{asset('assets/front/js/nicEdit.js')}}"></script>

    <script type="text/javascript">
        //<![CDATA[
        bkLib.onDomLoaded(function () {
            nicEditors.allTextAreas()
        });
        //]]>
    </script>

    <script type="text/javascript">

$('#hak_user_submit_btn').click(function(){
        var ff_val = $('#ff').val();
        var ff_val1 = ff_val.replace('https://facebook.com/','');
        if(ff_val1 != ''){
            $('#ff').val('https://facebook.com/'+ff_val1);
        }
        var gg_val = $('#gg').val();
        var gg_val1 = gg_val.replace('https://instagram.com/','');
        if(gg_val1 != ''){
            $('#gg').val('https://instagram.com/'+gg_val1);
        }
        var tt_val = $('#tt').val();
        var tt_val1 = tt_val.replace('https://twitter.com/','');
        if(tt_val1 != ''){
            $('#tt').val('https://twitter.com/'+tt_val1);
        }
        var lin_val = $('#lin').val();
        var lin_val1 = lin_val.replace('https://linkedin.com/','');
        if(lin_val1 != ''){
            $('#lin').val('https://linkedin.com/'+lin_val1);
        }
        return true;
    });

        // Handling the click event
        $("#add-field-btn").on('click', function () {
            var title = $('#tttl').val();
            var desc = $('#dddc').val();

            $(".qualification").append('<div class="qualification-area">' +
                '<div class="form-group">' +
                '<div class="col-xs-10 col-sm-5 col-md-offset-1">' +
                '<input type="text" class="form-control" name="title[]" id="title" placeholder="' + title + '" required="">' +
                '</div>' +
                '<div class="col-xs-10 col-sm-5">' +
                '<input type="text" class="form-control" name="details[]" id="text_details" placeholder="' + desc + '" required="">' +
                '</div>' +
                '</div>' +
                '<span class="ui-close">X</span>' +
                '</div>');

        });

        function isEmpty(el) {
            return !$.trim(el.html())
        }

        $(document).on('click', '.ui-close', function () {
            $(this.parentNode).hide();
            $(this.parentNode).remove();
            if (isEmpty($('#q'))) {
                var title = $('#tttl').val();
                var desc = $('#dddc').val();
                $(".qualification").append('<div class="qualification-area">' +
                    '<div class="form-group">' +
                    '<div class="col-xs-10 col-sm-5 col-md-offset-1">' +
                    '<input type="text" class="form-control" name="title[]" id="title" placeholder="' + title + '">' +
                    '</div>' +
                    '<div class="col-xs-10 col-sm-5">' +
                    '<input type="text" class="form-control" name="details[]" id="text_details" placeholder="' + desc + '">' +
                    '</div>' +
                    '</div>' +
                    '<span class="ui-close">X</span>' +
                    '</div>');
            }
        });


        function uploadclick() {
            $("#uploadFile").click();
            $("#uploadFile").change(function (event) {
                readURL(this);
                $("#uploadTrigger").html($("#uploadFile").val());
            });

        }


        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#adminimg').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>

    <script src="{{asset('assets/admin/js/jquery152.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/jqueryui.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/tag-it.js')}}" type="text/javascript" charset="utf-8"></script>



    <script type="text/javascript">
        $(document).ready(function () {
            $("#myTags").tagit({
                fieldName: "special[]",
                allowSpaces: true
            });
            $("#category_name").tagit({
                fieldName: "category_name[]",
                allowSpaces: true
            });
        });
    </script>


@endsection