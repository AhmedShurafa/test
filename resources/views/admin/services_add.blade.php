@extends('layouts.linkes')
@section('content')
    <h1 class="text-center">Add Information</h1>
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
        <form action="{{route('admin.services.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <!-- Start Add Education -->
                <div class="col-md-6 card p-2 float-left">
                    <h2 class="alert alert-primary">Services</h2>
                    <div class="form-group">
                        <p for="inputTitle">Title</p>
                        <input type="text" class="form-control" name="title" id="inputTitle" placeholder="Title">
                    </div>

                    <div class="form-group">
                        <p for="inputTitle_ar" class="text-right">عنوان الخدمة</p>
                        <input type="text" class="form-control" name="title_ar" id="inputTitle_ar" placeholder="العنوان الخدمة">
                    </div>

                    <div class="form-group">
                        <p>Description</p>
                        <textarea class="form-control" name="desc" cols="20" rows="6" placeholder="Description ..."></textarea>
                    </div>

                    <div class="form-group">
                        <p class="text-right">وصف الخدمة</p>
                        <textarea class="form-control" name="desc_ar" cols="20" rows="6" placeholder="وصف الخدمة ..."></textarea>
                    </div>

                    <div class="form-group">
                        <p for="inputImage">Image</p>
                        <input type="file" class="form-control" name="icon" id="inputImage">
                    </div>

                </div>
                <!-- End Add Education -->

                <!-- Start Add Testimonials -->
                <div class="col-md-6 card p-2 float-left d-table">
                    <h2 class="alert alert-success">Testimonials</h2>
                    <div class="form-group">
                        <p for="inputName">Name</p>
                        <input type="text" class="form-control" name="name" id="inputName" placeholder="Title">
                    </div>

                    <div class="form-group">
                        <p for="inputName_ar" class="text-right">الاسم</p>
                        <input type="text" class="form-control" name="name_ar" id="inputName_ar" placeholder="الاسم">
                    </div>

                    <div class="form-group">
                        <p for="inputcompany">Company</p>
                        <input class="form-control" name="company" id="inputcompany" placeholder="Company">
                    </div>

                    <div class="form-group text-right">
                        <p for="inputcompany_ar">الشركة</p>
                        <input class="form-control" name="company_ar" id="inputcompany_ar" placeholder="الشركة">
                    </div>

                    <div class="form-group">
                        <p for="inputDesc">Description</p>
                        <textarea class="form-control" name="description" id="description" placeholder="Description ..."></textarea>
                    </div>

                    <div class="form-group">
                        <p for="inputDesc_ar" class="text-right">الوصف</p>
                        <textarea class="form-control" name="description_ar" id="inputDesc_ar" placeholder="الوصف ..."></textarea>
                    </div>

                    <div class="form-group">
                        <p for="inputImage">Image</p>
                        <input type="file" class="form-control" name="user" id="inputImage">
                    </div>


                </div>
                <!-- End Add Testimonials -->
            </div>

            <!-- start Add Clients -->
            <div class="mt-4 mb-5">
                <div class="form-row">
                    <div class="col-md-6 card p-2 d-table">
                            <h3 class="alert alert-dark">Clients</h3>
                            <p for="inputImage">Image</p>
                            <input type="file" class="form-control" name="logo[]" id="inputImage" multiple>
                    </div>
                </div>
            </div>
            <!-- End Add Clients -->

            <!-- Start Submit Filed -->
            <div class="form-group text-center">
                <div class="col">
                    <input type="submit" value="Add" class="btn btn-primary">
                </div>
            </div>

        </form>
    </div>
    <script type="text/javascript">
        Dropzone.options.imageUpload = {
            maxFilesize         :       1,
            acceptedFiles: ".jpeg,.jpg,.png,.gif"
        };
    </script>
@endsection
