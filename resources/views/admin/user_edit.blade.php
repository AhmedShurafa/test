@extends('layouts.linkes')
@section('content')

<div class="mt-5 mb-5">
    <div class="container">
        <div class="card">
            <h5 class="card-header">Edit User Information

                <a class="float-right" href="{{route('admin.home')}}"><- Go Back</a>
            </h5>

            <div class="card-body">
                @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                            <li class="btn btn-danger text-left mb-1"> {{ $error }} </li>
                        @endforeach
                    </ul>
                @endif
                @if (session('success'))
                    <div class="col-sm-12">
                        <div class="alert alert-success text-center" role="alert">
                            {{ session('success') }}
                        </div>
                    </div>
                @endif
                <!--start colors-->
                        <section class="option-box">
                            <div class="color-option">
                                <h4 style="color: #fff">color option</h4>
                                <ul class="list-unstyled">
                                    <li data-value="css/main-teal.css"></li>
                                    <li data-value="css/main-red.css"></li>
                                    <li data-value="css/main-purple.css"></li>
                                    <li data-value="css/main-pink.css"></li>
                                    <li data-value="css/main-orange.css"></li>
                                    <li data-value="css/main-lime.css"></li>
                                    <li data-value="css/main-light-blue.css"></li>
                                    <li data-value="css/main-green.css"></li>
                                    <li data-value="css/main-deep-purple.css"></li>
                                    <li data-value="css/main-deep-orange.css"></li>
                                    <li data-value="css/main-blue.css"></li>
                                    <li data-value="css/main-amber.css"></li>
                                </ul>
                            </div>
                            <i class="fa fa-gear fa-2x gear-check"></i>
                        </section>
                <!-- End Choses Color -->
                <form method="POST" action="{{route( 'admin.home.update',1)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <input type="hidden" id="colorUser" name="colorUser" class="btn btn-primary colorUser">

                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="User Name">
                        </div>

                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" name="name_ar" value="{{$user->name_ar}}" placeholder="الاسم باللغة العربية">
                        </div>

                        <div class="col-md-6 form-group">
                            <input type="email" class="form-control" value="{{$user->email}}" name="email" placeholder="Eamil">
                        </div>

                        <div class="col-md-6 form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>

                        <div class="col-md-6 form-group">
                            <input type="text" class="form-control" name="nameJob" value="{{$user->info->N_job}}" placeholder="Name job">
                        </div>

                        <div class="col-md-6 form-group">
                            <input type="text" class="form-control" name="nameJob_ar" value="{{$user->info->N_job_ar}}" placeholder="اسم الوظيفة بالعربي">
                        </div>

                        <div class="col-md-6 form-group">
                            <input type="text" class="form-control"  value="{{$user->info->residence}}"  name="residence" placeholder="Residence">
                        </div>

                        <div class="col-md-6 form-group">
                            <input type="text" class="form-control"  value="{{$user->info->residence_ar}}"  name="residence_ar" placeholder="الاقامة بالعربي">
                        </div>

                        <div class="col-md-6 form-group">
                            <input type="text" class="form-control"  value="{{$user->info->address}}" name="address" placeholder="Address">
                        </div>

                        <div class="col-md-6 form-group">
                            <input type="text" class="form-control"  value="{{$user->info->address_ar}}" name="address_ar" placeholder="العنوان بالعربي">
                        </div>

                        <div class="col-md-6 form-group">
                            <input type="text" class="form-control"  value="{{$user->info->age}}" name="age" placeholder="Age">
                        </div>

                        <div class="col-md-6 form-group">
                            <input type="text" class="form-control"  value="{{$user->info->phone}}" name="phone" placeholder="Phone">
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="text" class="form-control"  value="{{$user->info->twitter}}" name="twitter" placeholder="Twitter">
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="text" class="form-control"  value="{{$user->info->facebook}}" name="facebook" placeholder="Facebook">
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="text" class="form-control"  value="{{$user->info->insta}}" name="instagram" placeholder="Instagram">
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="text" class="form-control"  value="{{$user->info->linked}}" name="linked" placeholder="linked">
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="text" class="form-control"  value="{{$user->info->github}}" name="github" placeholder="github">
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="file" name="image" class="form-control" placeholder="image">
                        </div>

                        <div class="col-md-6 form-group">
                            <p class="ml-2">file Cv</p>
                            <input type="file" name="file" class="form-control" placeholder="File">
                        </div>

                        <div class="col-md-6 form-group">
                            <p class="ml-2">Code to Download Cv</p>
                            <input type="text" name="code" class="form-control" placeholder="Code to Download cv">
                        </div>

                        <div class="col-md-6 form-group">
                            <textarea class="form-control" rows="10"
                                    name="descriptionJob" placeholder="Description Your Job...">{{$user->info->D_job}}</textarea>
                        </div>

                        <div class="col-md-6 form-group">
                            <textarea class="form-control" rows="10"
                                    name="descriptionJob_ar" placeholder="نبذه عني بالعربي">{{$user->info->D_job_ar}}</textarea>
                        </div>
                    </div>

                    <div class="col-md-6 form-group">
                        <p>free</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio"  name="free"
                                   id="example1" value="1" {{($user->info->free==1) ? 'checked' : ''}}>
                            <label class="form-check-label" for="example1">
                                Available
                            </label>
                        </div>
                        <div class="form-check" style="margin-left: 120px;">
                            <input class="form-check-input" type="radio" name="free" id="example2" value="0" {{($user->info->free==0) ? 'checked' : ''}}>
                            <label class="form-check-label" for="example2">
                                Unavailable
                            </label>
                        </div>

                    </div>

                    <div class="col-md-6 form-group">
                        <div class="text-center">
                            <button type="submit" class="p-2">Updata</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
