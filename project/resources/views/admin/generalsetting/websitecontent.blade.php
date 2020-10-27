@extends('layouts.admin')


@section('styles')

<link href="{{asset('assets/admin/css/jquery-ui.css')}}" rel="stylesheet" type="text/css">

<style type="text/css">
    .colorpicker-alpha {display:none !important;}
    .colorpicker{ min-width:128px !important;}
    .colorpicker-color {display:none !important;}
</style>

@endsection

@section('content')
<div class="right-side">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- Starting of Dashboard Website Title -->
                        <div class="section-padding add-product-1">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="add-product-box">
                                        <div class="add-product-header">
                                            <h2>Website Contents</h2> 
                                        </div>
                                        <hr>
                                    <form class="form-horizontal" action="{{route('admin-gs-contentsup')}}" method="POST" enctype="multipart/form-data">

                                            @include('includes.form-success')      
                                          {{csrf_field()}}
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="website_title">Website Title *</label>
                                            <div class="col-sm-6">
                                              <input name="title" id="website_title" class="form-control" placeholder="Enter Website Title" required="" type="text" value="{{$data->title}}">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="map_key">Google Map Api Key*</label>
                                            <div class="col-sm-6">
                                                <textarea name="map_key" id="map_key" class="form-control" placeholder="Enter Map Key" required="">{{$data->map_key}}</textarea>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="website_title">Theme Color *<span>Leaving Empty Will Set The Default Color (Don't Use RGB)</span></label>
                                            <div class="col-sm-6">
                                              <div id="cp2" class="input-group colorpicker-component">
                                  <input id="cp1" type="text" name="colors" value="{{$data->colors}}"  class="form-control"  />
                                    <span class="input-group-addon"><i></i></span>
                                    </div>

                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="current_logo">Current Admin Background Image</label>
                                            <div class="col-sm-6">
                                        <img id="adminimg" src="{{asset('assets/images/'.$data->bimg)}}" alt="No Icon Found" id="adminimg">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="bimg">Setup New Admin Background Image</label>
                                            <div class="col-sm-6">
                                              <input  type="file" name="bimg" id="bimg">
                                            </div>
                                          </div>
                                        <hr>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn add-product_btn">Update Setting</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard Website Title -->  
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

  

    <script>
            $('#cp1').colorpicker();
            $('#cp2').colorpicker();
    </script>



<script src="{{asset('assets/admin/js/jquery152.min.js')}}"></script>
<script src="{{asset('assets/admin/js/jqueryui.min.js')}}"></script>  
@endsection