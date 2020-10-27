@extends('layouts.admin')

@section('content')

<div class="right-side">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- Starting of Dashboard data-table area -->
                        <div class="section-padding add-product-1">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                  <div class="add-product-box">
                                      <div class="add-product-header products">
                                          <h2>Doctors</h2>
                                          <a href="{{route('admin-user-create')}}" class="btn add-newProduct-btn"><i class="fa fa-plus"></i> Add Doctor</a>  
                                      </div>
                                      <hr>
                  <div>
                                 @include('includes.form-success')
<div class="row">
  <div class="col-sm-12">
    <table id="example" class="table table-striped table-hover products dt-responsive dataTable no-footer dtr-inline" role="grid" aria-describedby="product-table_wrapper_info" style="width: 100%;" width="100%" cellspacing="0">
                                              <thead>
                                              <tr role="row">
                                                  <th class="sorting_asc" tabindex="0"
                                                      aria-controls="product-table_wrapper" rowspan="1" colspan="1"
                                                      style="width: 239px;" aria-sort="ascending"
                                                      aria-label="Donor's Photo: activate to sort column descending">
                                                      Doctor's Photo
                                                  </th>
                                                  <th class="sorting" tabindex="0" aria-controls="product-table_wrapper"
                                                      rowspan="1" colspan="1" style="width: 171px;"
                                                      aria-label="Donor's Name: activate to sort column ascending">
                                                      Doctor's Name
                                                  </th>
                                                  <th class="sorting" tabindex="0" aria-controls="product-table_wrapper"
                                                      rowspan="1" colspan="1" style="width: 134px;"
                                                      aria-label="Blood Group: activate to sort column ascending">Email
                                                  </th>
                                                  <th class="sorting" tabindex="0" aria-controls="product-table_wrapper"
                                                      rowspan="1" colspan="1" style="width: 95px;"
                                                      aria-label="City: activate to sort column ascending">Categories
                                                  </th>
                                                  <th class="sorting" tabindex="0" aria-controls="product-table_wrapper"
                                                      rowspan="1" colspan="1" style="width: 240px;"
                                                      aria-label="Actions: activate to sort column ascending">Actions
                                                  </th>
                                              </tr>
                                              </thead>

                                              <tbody>
                                                @foreach($users as $user)
                                                    <tr role="row" class="odd">

                                                        <td tabindex="0" class="sorting_1"><img
                                                                    src="{{ $user->photo ? asset('assets/images/'.$user->photo):'http://fulldubai.com/SiteImages/noimage.png'}}"
                                                                    alt="User's Photo"
                                                                    style="height: 180px; width: 200px;"></td>
                                                        <td>{{$user->name}}</td>
                                                        <td>
                                                            {{$user->email}}
                                                        </td>
                                                        <td>
                                                            @php
                                                                $sCat = 0;
                                                               $categories = explode(',', $user->category_name);
                                                            @endphp
                                                            @foreach($categories as $category)
                                                                @if($sCat != 0)
                                                                    {{","}}
                                                                @endif
                                                                {{$category}}
                                                                <?php $sCat++ ?>
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            @if($user->active == 1)

                                                                <a href="{{route('admin-user-st',['id1'=>$user->id,'id2'=>0])}}"
                                                                   class="btn btn-warning product-btn"><i
                                                                            class="fa fa-times"></i> Deactive</a>
                                                            @else

                                                                <a href="{{route('admin-user-st',['id1'=>$user->id,'id2'=>1])}}"
                                                                   class="btn btn-success product-btn"><i
                                                                            class="fa fa-times"></i> Active</a>
                                                            @endif
                                                            <a href="{{route('admin-user-edit',$user->id)}}"
                                                               class="btn btn-primary product-btn"><i
                                                                        class="fa fa-edit"></i> Edit</a>
                                                            <a href="{{route('admin-user-delete',$user->id)}}"
                                                               class="btn btn-danger product-btn"><i
                                                                        class="fa fa-trash"></i> Remove</a>
                                                        </td>
                                                    </tr>
                                                  @endforeach
                                                  </tbody>
                                          </table></div></div>
                                        </div>
                    </div>
                                  </div>
                              </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard data-table area -->
                </div>
            </div>
        </div>

@endsection

@section('scripts')

<script type="text/javascript">
  $('#example').DataTable();
</script>

@endsection