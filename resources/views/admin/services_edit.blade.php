@extends('layouts.linkes')

@section('content')
    <h1 class="text-center">Edit Information</h1>
    @php
        if(isset($services))
            $id = $services->id;
        else
            $id = $test->id;
    @endphp
    <div class="container">
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
        <form action="{{route('admin.services.update',$id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                @if(isset($services))
                <!-- Start Add Education -->
                <div class="col-md-6 card p-2 m-auto">
                    <h2 class="alert alert-primary">Services</h2>
                    <div class="form-group">
                        <p for="inputTitle">Title</p>
                        <input type="text" class="form-control" value="{{$services->title}}" name="title" id="inputTitle" placeholder="Title">
                    </div>

                    <div class="form-group">
                        <p for="inputTitle_ar" class="text-right">عنوان الخدمة</p>
                        <input type="text" class="form-control" value="{{$services->title_ar}}" name="title_ar" id="inputTitle_ar" placeholder="العنوان الخدمة">
                    </div>

                    <div class="form-group">
                        <p for="inputDesc">Description</p>
                        <textarea class="form-control" name="description"
                                cols="20" rows="6" id="inputDesc" placeholder="Description ...">{{$services->description}}</textarea>
                    </div>

                    <div class="form-group">
                        <p class="text-right">وصف الخدمة</p>
                        <textarea class="form-control" name="description_ar" cols="20" rows="6" placeholder="وصف الخدمة ...">{{$services->description_ar}}</textarea>
                    </div>

                    <div class="form-group">
                        <p for="inputImage">Image</p>
                        <input type="file" class="form-control h-25" name="icon" id="inputImage">
                        <input type="image" src="{{asset($services->image)}}"  alt="icon" width="100px">
                    </div>

                </div>
                <!-- End Add Education -->
                @endif
                @if(isset($test))
                <!-- Start Add Testimonials -->
                <div class="col-md-6 card p-2 m-auto">
                    <h2 class="alert alert-success">Testimonials</h2>
                    <div class="form-group">
                        <p for="inputName">Name</p>
                        <input type="text" class="form-control" value="{{$test->name}}" name="name" id="inputName" placeholder="Title">
                    </div>

                    <div class="form-group">
                        <p for="inputName_ar" class="text-right">الاسم</p>
                        <input type="text" class="form-control" value="{{$test->name_ar}}" name="name_ar" id="inputName_ar" placeholder="الاسم">
                    </div>

                    <div class="form-group">
                        <p for="inputcompany">Company</p>
                        <input class="form-control" name="company" value="{{$test->company}}" id="inputcompany" placeholder="Company">
                    </div>

                    <div class="form-group">
                        <p for="inputcompany_ar" class="text-right">الشركة</p>
                        <input class="form-control" name="company_ar" value="{{$test->company_ar}}" id="inputcompany_ar" placeholder="الشركة">
                    </div>

                    <div class="form-group">
                        <p for="inputDesc">Description</p>
                        <textarea class="form-control" name="description" id="description"
                                placeholder="Description ...">{{$test->description}}</textarea>
                    </div>

                    <div class="form-group">
                        <p for="inputDesc_ar" class="text-right">الوصف</p>
                        <textarea class="form-control" name="description_ar" id="inputDesc_ar" placeholder="الوصف ...">{{$test->description_ar}}</textarea>
                    </div>

                    <div class="form-group">
                        <p for="inputImage">Image</p>
                        <input type="file" class="form-control h-25" name="user" id="inputImage">
                        <input type="image" src="{{asset($test->image)}}" alt="user">
                    </div>
                </div>
                <!-- End Add Testimonials -->
                @endif
            </div>

            <!-- Start Submit Filed -->
            <div class="form-group text-center mt-3">
                <div class="col">
                    <input type="submit" value="Update" class="btn btn-primary">
                </div>
            </div>

        </form>
    </div>
@endsection
